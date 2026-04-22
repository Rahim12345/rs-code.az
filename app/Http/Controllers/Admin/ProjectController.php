<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Validator;

class ProjectController extends Controller
{
    private array $attrs = [
        'name_az'        => 'Ad (AZ)',
        'name_en'        => 'Name (EN)',
        'name_ru'        => 'Название (RU)',
        'slug_az'        => 'Slug (AZ)',
        'slug_en'        => 'Slug (EN)',
        'slug_ru'        => 'Slug (RU)',
        'description_az' => 'Açıqlama (AZ)',
        'description_en' => 'Description (EN)',
        'description_ru' => 'Описание (RU)',
        'tarix_az'       => 'Tarix (AZ)',
        'tarix_en'       => 'Date (EN)',
        'tarix_ru'       => 'Дата (RU)',
        'link'           => 'Link',
        'kateqoriya'     => 'Kateqoriya',
        'photos'         => 'Şəkillər',
    ];

    public function index()
    {
        $data['projects'] = Project::get();
        return view('back.project.index', $data);
    }

    public function index_add()
    {
        return view('back.project.add');
    }

    public function index_edit($id)
    {
        $data['project'] = Project::with('images')->findOrFail($id);
        return view('back.project.edit', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'name_az'        => 'required',
            'name_en'        => 'required',
            'name_ru'        => 'required',
            'slug_az'        => 'required',
            'slug_en'        => 'required',
            'slug_ru'        => 'required',
            'description_az' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'tarix_az'       => 'required',
            'tarix_en'       => 'required',
            'tarix_ru'       => 'required',
            'link'           => 'required',
            'kateqoriya'     => 'required',
            'photos'         => 'required',
            'photos.*'       => 'image',
        ];

        $validator = Validator::make($request->all(), $rules, [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $project = new Project;
        $project->name_az        = $request->name_az;
        $project->name_en        = $request->name_en;
        $project->name_ru        = $request->name_ru;
        $project->slug_az        = $request->slug_az;
        $project->slug_en        = $request->slug_en;
        $project->slug_ru        = $request->slug_ru;
        $project->description_az = $request->description_az;
        $project->description_en = $request->description_en;
        $project->description_ru = $request->description_ru;
        $project->tarix_az       = $request->tarix_az;
        $project->tarix_en       = $request->tarix_en;
        $project->tarix_ru       = $request->tarix_ru;
        $project->link           = $request->link;
        $project->kateqoriya     = $request->kateqoriya;
        // keep legacy columns in sync
        $project->name           = $request->name_az;
        $project->slug           = $request->slug_az;
        $project->tarix          = $request->tarix_az;
        $project->save();

        foreach ($request->file('photos') as $photo) {
            $photo_name = $this->storeImage($photo);
            DB::table('project_images')->insert(['project_id' => $project->id, 'photo' => $photo_name]);
        }

        return response()->json(['message' => 'Layihə uğurla əlavə olundu']);
    }

    public function update(Request $request, $id)
    {
        $project = Project::with('images')->findOrFail($id);

        $rules = [
            'name_az'        => 'required',
            'name_en'        => 'required',
            'name_ru'        => 'required',
            'slug_az'        => 'required',
            'slug_en'        => 'required',
            'slug_ru'        => 'required',
            'description_az' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'tarix_az'       => 'required',
            'tarix_en'       => 'required',
            'tarix_ru'       => 'required',
            'link'           => 'required',
            'kateqoriya'     => 'required',
            'photos.*'       => 'image',
        ];

        $validator = Validator::make($request->all(), $rules, [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $project->name_az        = $request->name_az;
        $project->name_en        = $request->name_en;
        $project->name_ru        = $request->name_ru;
        $project->slug_az        = $request->slug_az;
        $project->slug_en        = $request->slug_en;
        $project->slug_ru        = $request->slug_ru;
        $project->description_az = $request->description_az;
        $project->description_en = $request->description_en;
        $project->description_ru = $request->description_ru;
        $project->tarix_az       = $request->tarix_az;
        $project->tarix_en       = $request->tarix_en;
        $project->tarix_ru       = $request->tarix_ru;
        $project->link           = $request->link;
        $project->kateqoriya     = $request->kateqoriya;
        $project->name           = $request->name_az;
        $project->slug           = $request->slug_az;
        $project->tarix          = $request->tarix_az;
        $project->save();

        // Handle new photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photo_name = $this->storeImage($photo);
                DB::table('project_images')->insert(['project_id' => $id, 'photo' => $photo_name]);
            }
        }

        return response()->json(['message' => 'Layihə uğurla yeniləndi']);
    }

    public function deleteImage($id)
    {
        $img = DB::table('project_images')->where('id', $id)->first();
        if (!$img) {
            return response()->json(['message' => 'Tapılmadı'], 404);
        }
        \File::delete(public_path('images/projects/' . $img->photo));
        DB::table('project_images')->where('id', $id)->delete();
        return response()->json(['message' => 'Şəkil silindi']);
    }

    public function toggleHome($id)
    {
        $project = Project::findOrFail($id);
        $project->home = $project->home ? 0 : 1;
        $project->save();
        return response()->json(['home' => $project->home]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $project = Project::find($id);
        if (!$project) {
            return response()->json(['status' => 0, 'message' => 'Tapılmadı']);
        }
        foreach ($project->images as $img) {
            \File::delete(public_path('images/projects/' . $img->photo));
        }
        DB::table('project_images')->where('project_id', $id)->delete();
        $project->delete();
        return response()->json(['status' => 1, 'message' => 'Uğurla Silindi', 'id' => $id]);
    }

    /**
     * Convert any uploaded image to WebP and resize to max 1400px wide.
     * Saves ~70–90% file size vs PNG, ~20–40% vs JPEG.
     */
    private function storeImage(\Illuminate\Http\UploadedFile $file): string
    {
        $maxW    = 1400;
        $quality = 85;
        $ext     = strtolower($file->getClientOriginalExtension());

        $src = match ($ext) {
            'png'  => imagecreatefrompng($file->getRealPath()),
            'gif'  => imagecreatefromgif($file->getRealPath()),
            'webp' => imagecreatefromwebp($file->getRealPath()),
            default => imagecreatefromjpeg($file->getRealPath()),
        };

        // GD failed — fall back to moving the file as-is
        if (!$src) {
            $name = uniqid() . '.' . $ext;
            $file->move(public_path('images/projects'), $name);
            return $name;
        }

        $sw = imagesx($src);
        $sh = imagesy($src);

        // Resize if wider than $maxW (height scales proportionally)
        if ($sw > $maxW) {
            $dh  = (int) round($sh * $maxW / $sw);
            $dst = imagecreatetruecolor($maxW, $dh);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $maxW, $dh, $sw, $sh);
            imagedestroy($src);
            $src = $dst;
        }

        $filename = uniqid() . '.webp';
        imagewebp($src, public_path('images/projects/' . $filename), $quality);
        imagedestroy($src);

        return $filename;
    }
}
