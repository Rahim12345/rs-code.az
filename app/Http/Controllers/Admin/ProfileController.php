<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Validator;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class ProfileController extends Controller
{
    public function index()
    {
        return view('back.profile.index', ['user' => Auth::user()]);
    }

    /* ── Profil yenilə ─────────────────────────────────── */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:100',
            'email' => 'required|email|unique:admins,email,' . $user->id,
        ], [], ['name' => 'Ad', 'email' => 'Email']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Admin::where('id', $user->id)->update(['name' => $request->name, 'email' => $request->email]);

        return response()->json(['message' => 'Profil yeniləndi']);
    }

    /* ── Şifrə yenilə ──────────────────────────────────── */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password'         => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Mövcud şifrəni daxil edin',
            'password.required'         => 'Yeni şifrəni daxil edin',
            'password.min'              => 'Şifrə minimum 6 simvol olmalıdır',
            'password.confirmed'        => 'Şifrələr uyğun gəlmir',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['errors' => ['current_password' => ['Mövcud şifrə yanlışdır']]], 422);
        }

        Admin::where('id', $user->id)->update(['password' => Hash::make($request->password)]);

        return response()->json(['message' => 'Şifrə uğurla dəyişdirildi']);
    }

    /* ── 2FA setup ──────────────────────────────────────── */
    public function setup2fa()
    {
        $user   = Auth::user();
        $google = new Google2FA();

        if (!$user->two_factor_secret) {
            $secret = $google->generateSecretKey();
            Admin::where('id', $user->id)->update(['two_factor_secret' => $secret]);
            $user = Admin::find($user->id);
        }

        $qrUrl = $google->getQRCodeUrl(
            config('app.name', 'RS Code Admin'),
            $user->email,
            $user->two_factor_secret
        );

        $renderer = new ImageRenderer(new RendererStyle(200), new SvgImageBackEnd());
        $qrSvg    = (new Writer($renderer))->writeString($qrUrl);
        $qrImage  = 'data:image/svg+xml;base64,' . base64_encode($qrSvg);

        return response()->json([
            'secret'   => $user->two_factor_secret,
            'qr_image' => $qrImage,
            'enabled'  => (bool) $user->two_factor_enabled,
        ]);
    }

    public function enable2fa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|digits:6',
        ], ['code.required' => 'OTP kodu daxil edin', 'code.digits' => '6 rəqəmli kod daxil edin']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user   = Auth::user();
        $google = new Google2FA();

        $valid = $google->verifyKey($user->two_factor_secret, $request->code);

        if (!$valid) {
            return response()->json(['errors' => ['code' => ['Kod yanlışdır. Tətbiqi yenidən yoxlayın.']]], 422);
        }

        Admin::where('id', $user->id)->update(['two_factor_enabled' => true]);

        return response()->json(['message' => '2FA uğurla aktivləşdirildi']);
    }

    public function disable2fa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|digits:6',
        ], ['code.required' => 'OTP kodu daxil edin', 'code.digits' => '6 rəqəmli kod daxil edin']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user   = Auth::user();
        $google = new Google2FA();

        $valid = $google->verifyKey($user->two_factor_secret, $request->code);

        if (!$valid) {
            return response()->json(['errors' => ['code' => ['Kod yanlışdır']]], 422);
        }

        Admin::where('id', $user->id)->update(['two_factor_enabled' => false, 'two_factor_secret' => null]);

        return response()->json(['message' => '2FA deaktiv edildi']);
    }

    /* ── DB Backup ─────────────────────────────────────── */

    private function backupDir(): string
    {
        $dir = storage_path('app/backups');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }

    private function findMysqldump(): ?string
    {
        $candidates = [
            'mysqldump',
            'C:\\laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\mysqldump.exe',
            'C:\\laragon\\bin\\mysql\\mysql-5.7.39-winx64\\bin\\mysqldump.exe',
            '/usr/bin/mysqldump',
            '/usr/local/bin/mysqldump',
        ];
        foreach ($candidates as $c) {
            if (str_contains($c, '\\') || str_contains($c, '/')) {
                if (file_exists($c)) return $c;
            } else {
                exec('which ' . escapeshellarg($c) . ' 2>/dev/null', $out, $rc);
                if ($rc === 0 && !empty($out)) return trim($out[0]);
            }
        }
        return null;
    }

    public function index()
    {
        $backups = [];
        $dir = $this->backupDir();
        foreach (glob($dir . '/*.sql') as $file) {
            $backups[] = [
                'name'    => basename($file),
                'size'    => filesize($file),
                'created' => filemtime($file),
            ];
        }
        usort($backups, fn($a, $b) => $b['created'] - $a['created']);

        return view('back.profile.index', [
            'user'    => Auth::user(),
            'backups' => $backups,
        ]);
    }

    public function createBackup()
    {
        $cfg    = config('database.connections.' . config('database.default'));
        $host   = $cfg['host'];
        $port   = $cfg['port'] ?? 3306;
        $db     = $cfg['database'];
        $user   = $cfg['username'];
        $pass   = $cfg['password'];

        $binary = $this->findMysqldump();
        if (!$binary) {
            return response()->json(['error' => 'mysqldump tapılmadı. Serverinizdə quraşdırılıb?'], 500);
        }

        $filename = 'backup_' . $db . '_' . date('Y-m-d_H-i-s') . '.sql';
        $filePath = $this->backupDir() . '/' . $filename;

        $passArg = $pass ? '--password=' . escapeshellarg($pass) : '';
        $cmd = sprintf(
            '%s --host=%s --port=%s --user=%s %s %s > %s 2>&1',
            escapeshellarg($binary),
            escapeshellarg($host),
            escapeshellarg((string)$port),
            escapeshellarg($user),
            $passArg,
            escapeshellarg($db),
            escapeshellarg($filePath)
        );

        exec($cmd, $output, $code);

        if ($code !== 0 || !file_exists($filePath) || filesize($filePath) === 0) {
            @unlink($filePath);
            return response()->json(['error' => 'Backup alınamadı: ' . implode(' ', $output)], 500);
        }

        return response()->json([
            'message' => 'Backup uğurla yaradıldı',
            'backup'  => [
                'name'    => $filename,
                'size'    => filesize($filePath),
                'created' => filemtime($filePath),
            ],
        ]);
    }

    public function downloadBackup(string $file)
    {
        // Prevent path traversal
        if (str_contains($file, '/') || str_contains($file, '\\') || str_contains($file, '..')) {
            abort(400);
        }
        $path = $this->backupDir() . '/' . $file;
        if (!file_exists($path)) abort(404);

        return response()->download($path, $file);
    }

    public function deleteBackup(string $file)
    {
        if (str_contains($file, '/') || str_contains($file, '\\') || str_contains($file, '..')) {
            return response()->json(['error' => 'Yanlış fayl adı'], 400);
        }
        $path = $this->backupDir() . '/' . $file;
        if (!file_exists($path)) {
            return response()->json(['error' => 'Fayl tapılmadı'], 404);
        }
        unlink($path);
        return response()->json(['message' => 'Backup silindi']);
    }
}
