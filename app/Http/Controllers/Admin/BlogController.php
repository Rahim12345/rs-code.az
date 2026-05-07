<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;

class BlogController extends Controller
{
    private array $attrs = [
        'slug_az'              => 'Slug (AZ)',
        'slug_en'              => 'Slug (EN)',
        'slug_ru'              => 'Slug (RU)',
        'title_az'             => 'Başlıq (AZ)',
        'title_en'             => 'Title (EN)',
        'title_ru'             => 'Заголовок (RU)',
        'review_az'            => 'Xülasə (AZ)',
        'review_en'            => 'Review (EN)',
        'review_ru'            => 'Описание (RU)',
        'text_az'              => 'Mətn (AZ)',
        'text_en'              => 'Content (EN)',
        'text_ru'              => 'Содержание (RU)',
        'date_az'              => 'Tarix (AZ)',
        'date_en'              => 'Date (EN)',
        'date_ru'              => 'Дата (RU)',
        'meta_title_az'        => 'Meta Başlıq (AZ)',
        'meta_title_en'        => 'Meta Title (EN)',
        'meta_title_ru'        => 'Meta Заголовок (RU)',
        'meta_description_az'  => 'Meta Açıqlama (AZ)',
        'meta_description_en'  => 'Meta Description (EN)',
        'meta_description_ru'  => 'Meta Описание (RU)',
        'meta_keywords_az'     => 'Meta Açar Sözlər (AZ)',
        'meta_keywords_en'     => 'Meta Keywords (EN)',
        'meta_keywords_ru'     => 'Meta Ключевые слова (RU)',
        'photo'                => 'Kapak şəkli (AZ)',
        'photo_en'             => 'Kapak şəkli (EN)',
        'photo_ru'             => 'Kapak şəkli (RU)',
    ];

    public function index()
    {
        $data['blogs'] = DB::table('blogs')->get();
        return view('back.blog.index', $data);
    }

    public function index_add()
    {
        return view('back.blog.add');
    }

    public function index_edit($id)
    {
        $data['blog'] = DB::table('blogs')->where('id', $id)->first();
        return view('back.blog.edit', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'slug_az'   => 'required',
            'slug_en'   => 'required',
            'slug_ru'   => 'required',
            'title_az'  => 'required',
            'title_en'  => 'required',
            'title_ru'  => 'required',
            'review_az' => 'required',
            'review_en' => 'required',
            'review_ru' => 'required',
            'text_az'   => 'required',
            'text_en'   => 'required',
            'text_ru'   => 'required',
            'date_az'   => 'required',
            'date_en'   => 'required',
            'date_ru'   => 'required',
            'photo'     => ($request->filled('ai_photo') && preg_match('/^ai_[\w.]+$/', $request->ai_photo)) ? 'nullable' : 'required|image',
            'photo_en'  => 'nullable|image',
            'photo_ru'  => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules, [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dir = public_path('images/blog');
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move($dir, $photo_name);
        } else {
            $photo_name = $request->ai_photo;
        }

        $photo_en_name = null;
        if ($request->hasFile('photo_en')) {
            $f = $request->file('photo_en');
            $photo_en_name = uniqid() . '.' . $f->getClientOriginalExtension();
            $f->move($dir, $photo_en_name);
        } elseif ($request->filled('ai_photo_en') && preg_match('/^ai_[\w.]+$/', $request->ai_photo_en)) {
            $photo_en_name = $request->ai_photo_en;
        }

        $photo_ru_name = null;
        if ($request->hasFile('photo_ru')) {
            $f = $request->file('photo_ru');
            $photo_ru_name = uniqid() . '.' . $f->getClientOriginalExtension();
            $f->move($dir, $photo_ru_name);
        } elseif ($request->filled('ai_photo_ru') && preg_match('/^ai_[\w.]+$/', $request->ai_photo_ru)) {
            $photo_ru_name = $request->ai_photo_ru;
        }

        DB::table('blogs')->insert([
            'slug_az'             => $request->slug_az,
            'slug_en'             => $request->slug_en,
            'slug_ru'             => $request->slug_ru,
            'title_az'            => $request->title_az,
            'title_en'            => $request->title_en,
            'title_ru'            => $request->title_ru,
            'review_az'           => $request->review_az,
            'review_en'           => $request->review_en,
            'review_ru'           => $request->review_ru,
            'text_az'             => $request->text_az,
            'text_en'             => $request->text_en,
            'text_ru'             => $request->text_ru,
            'date_az'             => $request->date_az,
            'date_en'             => $request->date_en,
            'date_ru'             => $request->date_ru,
            'meta_title_az'       => $request->meta_title_az,
            'meta_title_en'       => $request->meta_title_en,
            'meta_title_ru'       => $request->meta_title_ru,
            'meta_description_az' => $request->meta_description_az,
            'meta_description_en' => $request->meta_description_en,
            'meta_description_ru' => $request->meta_description_ru,
            'meta_keywords_az'    => $request->meta_keywords_az,
            'meta_keywords_en'    => $request->meta_keywords_en,
            'meta_keywords_ru'    => $request->meta_keywords_ru,
            'photo'               => $photo_name,
            'photo_en'            => $photo_en_name,
            'photo_ru'            => $photo_ru_name,
            'created_at'          => now(),
            'updated_at'          => now(),
        ]);

        return response()->json(['message' => 'Blog uğurla əlavə olundu']);
    }

    public function update(Request $request, $id)
    {
        if (!DB::table('blogs')->where('id', $id)->exists()) {
            return response()->json(['message' => 'Tapılmadı'], 404);
        }

        $blog = DB::table('blogs')->where('id', $id)->first();

        $rules = [
            'slug_az'   => 'required',
            'slug_en'   => 'required',
            'slug_ru'   => 'required',
            'title_az'  => 'required',
            'title_en'  => 'required',
            'title_ru'  => 'required',
            'review_az' => 'required',
            'review_en' => 'required',
            'review_ru' => 'required',
            'text_az'   => 'required',
            'text_en'   => 'required',
            'text_ru'   => 'required',
            'date_az'   => 'required',
            'date_en'   => 'required',
            'date_ru'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dir = public_path('images/blog');
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        if ($request->hasFile('photo')) {
            if ($blog->photo) \File::delete($dir . '/' . $blog->photo);
            $photo_name = uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move($dir, $photo_name);
        } elseif ($request->filled('ai_photo') && preg_match('/^ai_[\w.]+$/', $request->ai_photo)) {
            if ($blog->photo && $blog->photo !== $request->ai_photo) \File::delete($dir . '/' . $blog->photo);
            $photo_name = $request->ai_photo;
        } else {
            $photo_name = $blog->photo;
        }

        if ($request->hasFile('photo_en')) {
            if ($blog->photo_en) \File::delete($dir . '/' . $blog->photo_en);
            $photo_en_name = uniqid() . '.' . $request->file('photo_en')->getClientOriginalExtension();
            $request->file('photo_en')->move($dir, $photo_en_name);
        } elseif ($request->filled('ai_photo_en') && preg_match('/^ai_[\w.]+$/', $request->ai_photo_en)) {
            if ($blog->photo_en && $blog->photo_en !== $request->ai_photo_en) \File::delete($dir . '/' . $blog->photo_en);
            $photo_en_name = $request->ai_photo_en;
        } else {
            $photo_en_name = $blog->photo_en;
        }

        if ($request->hasFile('photo_ru')) {
            if ($blog->photo_ru) \File::delete($dir . '/' . $blog->photo_ru);
            $photo_ru_name = uniqid() . '.' . $request->file('photo_ru')->getClientOriginalExtension();
            $request->file('photo_ru')->move($dir, $photo_ru_name);
        } elseif ($request->filled('ai_photo_ru') && preg_match('/^ai_[\w.]+$/', $request->ai_photo_ru)) {
            if ($blog->photo_ru && $blog->photo_ru !== $request->ai_photo_ru) \File::delete($dir . '/' . $blog->photo_ru);
            $photo_ru_name = $request->ai_photo_ru;
        } else {
            $photo_ru_name = $blog->photo_ru;
        }

        DB::table('blogs')->where('id', $id)->update([
            'slug_az'             => $request->slug_az,
            'slug_en'             => $request->slug_en,
            'slug_ru'             => $request->slug_ru,
            'title_az'            => $request->title_az,
            'title_en'            => $request->title_en,
            'title_ru'            => $request->title_ru,
            'review_az'           => $request->review_az,
            'review_en'           => $request->review_en,
            'review_ru'           => $request->review_ru,
            'text_az'             => $request->text_az,
            'text_en'             => $request->text_en,
            'text_ru'             => $request->text_ru,
            'date_az'             => $request->date_az,
            'date_en'             => $request->date_en,
            'date_ru'             => $request->date_ru,
            'meta_title_az'       => $request->meta_title_az,
            'meta_title_en'       => $request->meta_title_en,
            'meta_title_ru'       => $request->meta_title_ru,
            'meta_description_az' => $request->meta_description_az,
            'meta_description_en' => $request->meta_description_en,
            'meta_description_ru' => $request->meta_description_ru,
            'meta_keywords_az'    => $request->meta_keywords_az,
            'meta_keywords_en'    => $request->meta_keywords_en,
            'meta_keywords_ru'    => $request->meta_keywords_ru,
            'photo'               => $photo_name,
            'photo_en'            => $photo_en_name,
            'photo_ru'            => $photo_ru_name,
            'updated_at'          => now(),
        ]);

        return response()->json(['message' => "Blog uğurla yeniləndi"]);
    }

    public function aiGenerate()
    {
        $apiKey = DB::table('settings')->where('key', 'openai_api_key')->value('value');
        if (!$apiKey) {
            return response()->json(['ok' => false, 'message' => 'API açarı tapılmadı. Sistem Ayarlarından əlavə edin.']);
        }

        $model = DB::table('settings')->where('key', 'openai_model')->value('value') ?: 'gpt-4o-mini';

        $existingTitles = DB::table('blogs')
            ->pluck('title_az')
            ->filter()
            ->take(30)
            ->implode(' | ');

        $dateAz = now()->day . ' ' . ['Yanvar','Fevral','Mart','Aprel','May','İyun','İyul','Avqust','Sentyabr','Oktyabr','Noyabr','Dekabr'][now()->month - 1] . ', ' . now()->year;
        $dateEn = now()->format('F j, Y');
        $dateRu = now()->day . ' ' . ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'][now()->month - 1] . ' ' . now()->year . ' г.';

        $system = 'Sən RS Code şirkəti üçün peşəkar SEO blog müəllifisin. RS Code — Azərbaycanda veb sayt hazırlama, POS sistemləri, proqramlaşdırma dərsləri, mobil tətbiqlər, SEO xidmətləri sahəsindəki IT şirkətidir. Yazdığın məqalələr insanın yazdığından fərqlənməməlidir — təbii, canlı, peşəkar üslub.';

        $user = <<<PROMPT
Aşağıdakı mövcud blog başlıqlarına BAX, FƏRQLI bir mövzu seç:
{$existingTitles}

Mövzu sahələri (seçim üçün):
- Veb sayt hazırlama (növləri, xərcləri, texnologiyaları)
- POS sistemləri / restoran, mağaza proqramları
- Proqramlaşdırma dilləri (PHP, Python, JavaScript, vs.)
- SEO optimallaşdırma texnikaları
- Mobil tətbiq hazırlama (iOS/Android)
- E-ticarət / onlayn mağaza qurma
- Kibertəhlükəsizlik əsasları
- Süni zəka biznes həllərində
- UI/UX dizayn prinsipləri
- Veb hosting / domain seçimi

3 dildə tam blog yazısı yaz. Cavabı YALNIZ JSON formatında ver:

{
  "title_az": "Azərbaycanca başlıq (cəlbedici, 50-70 simvol)",
  "title_en": "English title (50-70 chars)",
  "title_ru": "Русский заголовок (50-70 символов)",
  "slug_az": "kicik-herf-tire-ile-ayrilmis-az",
  "slug_en": "lowercase-hyphenated-en",
  "slug_ru": "strochnyye-bukvy-cherez-tire-ru",
  "dalle_prompt": "DALL-E 3 image prompt in English for this blog cover. Photorealistic or modern illustration style, professional tech imagery, no text, no letters, 16:9 blog header composition.",
  "review_az": "Cəlbedici 2-3 cümlə xülasə (150-200 simvol)",
  "review_en": "Engaging 2-3 sentence summary (150-200 chars)",
  "review_ru": "Привлекательное резюме 2-3 предложения (150-200 символов)",
  "text_az": "HTML formatında ən az 700 söz (<h2>,<p>,<ul><li>,<strong> istifadə et)",
  "text_en": "HTML formatted min 700 words (<h2>,<p>,<ul><li>,<strong>)",
  "text_ru": "HTML формат минимум 700 слов (<h2>,<p>,<ul><li>,<strong>)",
  "meta_title_az": "55-60 simvol, əsas keyword daxil",
  "meta_title_en": "55-60 chars, main keyword included",
  "meta_title_ru": "55-60 символов, основной ключевик",
  "meta_description_az": "150-160 simvol, cəlbedici, keyword-lər daxil",
  "meta_description_en": "150-160 chars, compelling, keywords included",
  "meta_description_ru": "150-160 символов, убедительно, ключевые слова",
  "meta_keywords_az": "açar söz 1, açar söz 2, açar söz 3, açar söz 4, açar söz 5",
  "meta_keywords_en": "keyword 1, keyword 2, keyword 3, keyword 4, keyword 5",
  "meta_keywords_ru": "ключевое слово 1, ключевое слово 2, ключевое слово 3"
}

Tələblər:
- text sahələrindəki HTML: strukturlu (<h2> başlıqlar, <p> paraqraflar, <ul><li> siyahılar, <strong> vurğular)
- Azərbaycan mətni Azərbaycan türkcəsi ilə (Latın əlifbası)
- Rus mətni Kirill əlifbası ilə
- SEO meta: Google-da irəli çıxmaq üçün optimallaşdırılmış
- İnsan tərəfindən yazılmış kimi — rəsmi deyil, canlı üslub
PROMPT;

        $payload = [
            'model'           => $model,
            'response_format' => ['type' => 'json_object'],
            'messages'        => [
                ['role' => 'system', 'content' => $system],
                ['role' => 'user',   'content' => $user],
            ],
            'max_tokens'  => 4000,
            'temperature' => 0.82,
        ];

        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . $apiKey,
                'Content-Type: application/json',
            ],
        ]);
        $raw      = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            $err = json_decode($raw, true);
            return response()->json(['ok' => false, 'message' => $err['error']['message'] ?? 'OpenAI xətası: HTTP ' . $httpCode]);
        }

        $response = json_decode($raw, true);
        $content  = $response['choices'][0]['message']['content'] ?? '';

        if (preg_match('/\{[\s\S]*\}/u', $content, $m)) {
            $blog = json_decode($m[0], true);
        } else {
            $blog = json_decode($content, true);
        }

        if (!$blog || !isset($blog['title_az'])) {
            return response()->json(['ok' => false, 'message' => 'GPT cavabı parse edilə bilmədi. Yenidən cəhd edin.']);
        }

        $blog['date_az'] = $dateAz;
        $blog['date_en'] = $dateEn;
        $blog['date_ru'] = $dateRu;

        // ── DALL-E image generation ───────────────────────────────────────────
        $imageFiles  = null;
        $imagePreview = null;

        $dallePrompt = trim($blog['dalle_prompt'] ?? '');
        if (!$dallePrompt) {
            $dallePrompt = 'A professional modern blog cover image about: ' . ($blog['title_en'] ?? 'IT technology');
        }
        $dallePrompt .= '. Professional photography, clean background, tech theme, no text, no letters, no words.';

        $dalleBody = json_encode([
            'model'   => 'dall-e-3',
            'prompt'  => $dallePrompt,
            'n'       => 1,
            'size'    => '1792x1024',
            'quality' => 'standard',
        ]);

        $ch2 = curl_init('https://api.openai.com/v1/images/generations');
        curl_setopt_array($ch2, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $dalleBody,
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . $apiKey,
                'Content-Type: application/json',
            ],
        ]);
        $imgRaw  = curl_exec($ch2);
        $imgCode = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
        curl_close($ch2);

        if ($imgCode === 200) {
            $imgData = json_decode($imgRaw, true);
            $tmpUrl  = $imgData['data'][0]['url'] ?? null;

            if ($tmpUrl) {
                $imgContent = file_get_contents($tmpUrl);
                if ($imgContent !== false) {
                    $dir = public_path('images/blog');
                    if (!is_dir($dir)) mkdir($dir, 0755, true);

                    $ts   = time() . '_' . substr(uniqid(), -6);
                    $fileAz = 'ai_' . $ts . '_az.jpg';
                    $fileEn = 'ai_' . $ts . '_en.jpg';
                    $fileRu = 'ai_' . $ts . '_ru.jpg';

                    file_put_contents($dir . '/' . $fileAz, $imgContent);
                    file_put_contents($dir . '/' . $fileEn, $imgContent);
                    file_put_contents($dir . '/' . $fileRu, $imgContent);

                    $imageFiles   = ['az' => $fileAz, 'en' => $fileEn, 'ru' => $fileRu];
                    $imagePreview = asset('images/blog/' . $fileAz);
                }
            }
        }

        unset($blog['dalle_prompt']);

        return response()->json([
            'ok'            => true,
            'data'          => $blog,
            'image_files'   => $imageFiles,
            'image_preview' => $imagePreview,
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (DB::table('blogs')->where('id', $id)->exists()) {
            $blog = DB::table('blogs')->where('id', $id)->first();
            DB::table('blogs')->where('id', $id)->delete();
            \File::delete(public_path('images/blog/' . $blog->photo));
            return response()->json(['status' => 1, 'message' => 'Uğurla Silindi', 'id' => $id]);
        }
        return response()->json(['status' => 0, 'message' => 'Bazada belə bir məlumat yoxdur']);
    }
}
