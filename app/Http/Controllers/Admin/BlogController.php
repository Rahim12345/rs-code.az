<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BlogImageService;
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

    public function aiGenerate(Request $request)
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

        $system = 'Sən RS Code şirkəti üçün peşəkar SEO blog müəllifisin. RS Code — Azərbaycanda veb sayt hazırlama, POS sistemləri, LMS/onlayn təhsil, proqramlaşdırma dərsləri, SEO xidmətləri sahəsindəki IT şirkətidir. Effektiv SEO düsturu: [Xidmət] + [Azərbaycanda/Lokal] + [2026] + [Konkret sual/qiymət/müqayisə]. Yazdığın məqalələr dönüşüm yönümlüdür — oxucu sonda RS Code-a müraciət etməlidi. Canlı, peşəkar, insanın yazdığı kimi üslub.';

        $topicHint = trim($request->input('topic', ''));

        if ($topicHint) {
            $topicBlock = "Mövzu: \"{$topicHint}\"\nBu mövzuya uyğun blog yaz. SEO düsturuna riayət et: lokal keyword (Azərbaycanda/Bakıda/Gəncədə) + il (2026) + spesifik sual/qiymət/müqayisə.\n\nMövcud bloglara bax, eyni mövzunu təkrar etmə:\n{$existingTitles}";
        } else {
            $topicBlock = "Aşağıdakı mövcud blog başlıqlarına BAX, fərqli mövzu seç:\n{$existingTitles}\n\nGüclü mövzu sahələri (bu sahələrdən seç):\n- POS sistemləri: restoran/kafe/mağaza üçün qiymət, seçim, müqayisə (Azərbaycanda 2026)\n- LMS / onlayn kurs platformaları: hazır vs fərdi hazırlanma, qiymət, necə yaradılır\n- Veb sayt: qiymət, növlər, hazır vs sifarişlə (Bakı, Gəncə, Sumqayıt, Azərbaycan 2026)\n- SEO xidməti: Azərbaycanda, qiymət, necə işləyir, niyə vacibdir\n- Proqramlaşdırma: hansı dil seçmək, maaş, Azərbaycanda başlamaq\n- E-ticarət / onlayn mağaza: Azərbaycanda açmaq, qiymət, addımlar\n- Müqayisə yazıları: Laravel vs WordPress, Moodle vs Fərdi LMS, Wix vs Sifarişlə Sayt\n\nQaçınılacaq mövzular (YAZMA):\n- Ümumi trend yazıları (UI/UX trendləri, AI trendləri, Mobil trendlər)\n- Lokal element olmayan qlobal mövzular\n- Dönüşümsüz mövzular: \"Kibertəhlükəsizlik əsasları\", \"Süni zəka inqilabı\"";
        }

        $user = <<<PROMPT
{$topicBlock}

3 dildə tam blog yazısı yaz. Cavabı YALNIZ JSON formatında ver:

{
  "title_az": "Başlıq — SEO düsturu: [Xidmət]+[Azərbaycanda/Lokal]+[2026]+[Konkret sual], 50-70 simvol",
  "title_en": "English title following SEO formula, 50-70 chars",
  "title_ru": "Русский заголовок по формуле, 50-70 символов",
  "slug_az": "kicik-herf-tire-ile-ayrilmis-az",
  "slug_en": "lowercase-hyphenated-en",
  "slug_ru": "strochnyye-bukvy-cherez-tire-ru",
  "dalle_prompt": "DALL-E 3 image prompt in English. Photorealistic or modern illustration, professional tech theme, no text, no letters, 16:9 blog header.",
  "review_az": "Cəlbedici 2-3 cümlə xülasə (150-200 simvol)",
  "review_en": "Engaging 2-3 sentence summary (150-200 chars)",
  "review_ru": "Привлекательное резюме 2-3 предложения (150-200 символов)",
  "text_az": "Minimum 1500 söz, HTML format. Struktur: H2 başlıqlar (5-7 ədəd), <p>, <ul><li>, <strong>, müqayisə <table> (uyğunsa), FAQ bölməsi (4-6 sual <h3> ilə), sonda CTA (<p><strong>RS Code ilə əlaqə...</strong></p>), sonda FAQ JSON-LD <script type='application/ld+json'>...</script>",
  "text_en": "Minimum 1500 words, HTML. Structure: 5-7 H2, paragraphs, lists, comparison <table> (if applicable), FAQ section (4-6 Q&A with <h3>), CTA at end, FAQ JSON-LD schema at end (<script type='application/ld+json'>...</script>)",
  "text_ru": "Минимум 1500 слов, HTML. Структура: 5-7 H2, параграфы, списки, таблица сравнения (если уместно), FAQ (4-6 вопросов <h3>), CTA в конце, FAQ JSON-LD схема в конце (<script type='application/ld+json'>...</script>)",
  "meta_title_az": "55-60 simvol, lokal keyword + 2026 daxil",
  "meta_title_en": "55-60 chars, local keyword + 2026 included",
  "meta_title_ru": "55-60 символов, локальный ключевик + 2026",
  "meta_description_az": "150-160 simvol, cəlbedici, keyword-lər daxil, dönüşüm yönümlü",
  "meta_description_en": "150-160 chars, compelling, keywords, conversion-focused",
  "meta_description_ru": "150-160 символов, убедительно, ключевые слова",
  "meta_keywords_az": "açar söz 1, açar söz 2, açar söz 3, açar söz 4, açar söz 5",
  "meta_keywords_en": "keyword 1, keyword 2, keyword 3, keyword 4, keyword 5",
  "meta_keywords_ru": "ключевое слово 1, ключевое слово 2, ключевое слово 3"
}

Tələblər:
- Hər dil üçün minimum 1500 söz (Google qısa yazıları pis mövqeləndirir)
- Müqayisə mövzularında mütləq 1 HTML <table> cədvəl
- Mütləq FAQ bölməsi (4-6 sual, <h3> ilə)
- Mütləq FAQ JSON-LD Schema (text sonunda, <script type="application/ld+json"> ilə)
- Sonda CTA: RS Code ilə əlaqəyə dəvət
- Başlıqda lokal keyword (Azərbaycanda/Bakıda/Gəncədə) + 2026 il
- Mətnin içindən lokal keyword + ən azı 1 konkret statistika
- Azərbaycan mətni: Latın əlifbası ilə
- Rus mətni: Kirill əlifbası ilə
- Canlı, insan kimi üslub — "SEO optimizasiya edilmiş mətn" deyil
PROMPT;

        $payload = [
            'model'           => $model,
            'response_format' => ['type' => 'json_object'],
            'messages'        => [
                ['role' => 'system', 'content' => $system],
                ['role' => 'user',   'content' => $user],
            ],
            'max_tokens'  => 8000,
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

        // ── Blog cover image generation (PHP GD, no external API) ────────────
        $imageFiles   = null;
        $imagePreview = null;

        try {
            $imgSvc   = new BlogImageService();
            $slugHint = $blog['slug_az'] ?? ($blog['slug_en'] ?? '');
            $catHint  = $topicHint ?: ($blog['title_az'] ?? '');

            $fileAz = $imgSvc->generate($blog['title_az'] ?? '', 'az', $catHint, $slugHint);
            $fileEn = $imgSvc->generate($blog['title_en'] ?? '', 'en', $catHint, $slugHint);
            $fileRu = $imgSvc->generate($blog['title_ru'] ?? '', 'ru', $catHint, $slugHint);

            $imageFiles   = ['az' => $fileAz, 'en' => $fileEn, 'ru' => $fileRu];
            $imagePreview = asset('images/blog/' . $fileAz);
        } catch (\Throwable $e) {
            \Log::error('BlogImageService failed: ' . $e->getMessage());
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
