<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SystemSettingsController extends Controller
{
    private function getSetting(string $key, string $default = ''): string
    {
        return DB::table('settings')->where('key', $key)->value('value') ?? $default;
    }

    private function upsert(string $key, string $value): void
    {
        DB::table('settings')->updateOrInsert(
            ['key' => $key],
            ['value' => $value, 'updated_at' => now(), 'created_at' => now()]
        );
    }

    public function index()
    {
        $phpVersion     = phpversion();
        $laravelVersion = app()->version();
        $cacheDriver    = config('cache.default');
        $appEnv         = config('app.env');
        $isDown         = app()->isDownForMaintenance();

        try {
            DB::connection()->getPdo();
            $dbStatus = true;
            $dbName   = DB::connection()->getDatabaseName();
            $dbDriver = DB::connection()->getDriverName();
        } catch (\Exception) {
            $dbStatus = false;
            $dbName   = 'Xəta';
            $dbDriver = config('database.default');
        }

        $knownModels = ['gpt-4o-mini', 'gpt-4o', 'gpt-4-turbo', 'gpt-3.5-turbo'];
        $savedModel  = $this->getSetting('openai_model', 'gpt-4o-mini');

        $settings = [
            'openai_api_key'           => $this->getSetting('openai_api_key'),
            'openai_model'             => $savedModel,
            'openai_is_custom_model'   => !in_array($savedModel, $knownModels),
            'openai_question_language' => $this->getSetting('openai_question_language', 'az'),
            'institution_short_name'   => $this->getSetting('institution_short_name', 'ADPK'),
            'institution_full_name'    => $this->getSetting('institution_full_name', 'Azərbaycan Dövlət Pedaqoji Kolleci'),
            'institution_logo'         => $this->getSetting('institution_logo'),
        ];

        return view('back.system-settings.index', compact(
            'phpVersion', 'laravelVersion', 'cacheDriver', 'appEnv', 'isDown',
            'dbStatus', 'dbName', 'dbDriver',
            'settings'
        ));
    }

    public function saveAi(Request $request)
    {
        $request->validate([
            'openai_api_key'           => 'nullable|string|max:300',
            'openai_model'             => 'required|string|max:100',
            'openai_model_custom'      => 'nullable|string|max:100',
            'openai_question_language' => 'nullable|string|in:az,ru,en',
        ]);

        $key = trim($request->openai_api_key ?? '');
        if ($key !== '' && !preg_match('/^[•·]+$/', $key)) {
            $this->upsert('openai_api_key', $key);
        }

        $model = $request->openai_model === '_custom'
            ? trim($request->openai_model_custom ?? 'gpt-4o-mini')
            : $request->openai_model;

        $this->upsert('openai_model', $model ?: 'gpt-4o-mini');
        $this->upsert('openai_question_language', $request->openai_question_language ?? 'az');

        return redirect('/admin/settings?tab=ai')->with('success', 'AI ayarları yadda saxlanıldı');
    }

    public function saveInstitution(Request $request)
    {
        $request->validate([
            'institution_short_name' => 'required|string|max:50',
            'institution_full_name'  => 'required|string|max:500',
            'logo'                   => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        $this->upsert('institution_short_name', $request->institution_short_name);
        $this->upsert('institution_full_name', $request->institution_full_name);

        if ($request->hasFile('logo')) {
            $file     = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $dir      = public_path('img/logos');

            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            $file->move($dir, $filename);
            $this->upsert('institution_logo', $filename);
        }

        return redirect('/admin/settings?tab=institution')->with('success', 'Müəssisə məlumatları yadda saxlanıldı');
    }

    public function testOpenai(Request $request)
    {
        $key = trim($request->input('api_key', ''));
        if (!$key || preg_match('/^[•·]+$/', $key)) {
            $key = $this->getSetting('openai_api_key');
        }

        if (!$key) {
            return response()->json(['ok' => false, 'message' => 'API açarı tapılmadı — əvvəlcə yadda saxlayın']);
        }

        try {
            $ch = curl_init('https://api.openai.com/v1/models');
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 10,
                CURLOPT_HTTPHEADER     => [
                    'Authorization: Bearer ' . $key,
                    'Content-Type: application/json',
                ],
            ]);
            $body = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($code === 200) {
                return response()->json(['ok' => true, 'message' => 'Hesab yoxlandı — aktiv ✓']);
            }

            $data = json_decode($body, true);
            $msg  = $data['error']['message'] ?? ('HTTP ' . $code);
            return response()->json(['ok' => false, 'message' => $msg]);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => $e->getMessage()]);
        }
    }

    public function toggleMaintenance()
    {
        try {
            if (app()->isDownForMaintenance()) {
                Artisan::call('up');
                return response()->json(['ok' => true, 'status' => 'up', 'message' => 'Sayt aktiv rejimdədir']);
            }

            Artisan::call('down', ['--retry' => '60']);
            return response()->json(['ok' => true, 'status' => 'down', 'message' => 'Texniki xidmət rejimi aktivləşdi']);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => $e->getMessage()]);
        }
    }
}
