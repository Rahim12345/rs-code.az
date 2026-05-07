<?php

namespace App\Services;

class BlogImageService
{
    private const W = 1792;
    private const H = 1024;

    private string $fontBold;
    private string $fontRegular;
    private string $logoPath;

    public function __construct()
    {
        $this->fontBold    = 'C:/Windows/Fonts/calibrib.ttf';
        $this->fontRegular = 'C:/Windows/Fonts/calibri.ttf';
        $this->logoPath    = public_path('img/logos/logo_1778142039.png');
    }

    public function generate(string $title, string $lang, string $category, string $slug): string
    {
        $dir = public_path('images/blog');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $ts       = time() . '_' . substr(uniqid(), -6);
        $filename = 'ai_' . $ts . '_' . $lang . '.jpg';
        $path     = $dir . '/' . $filename;

        $img = imagecreatetruecolor(self::W, self::H);
        imagesavealpha($img, true);

        $theme = $this->theme($slug, $category);

        $this->drawBackground($img, $theme);
        $this->drawDiagonalStreaks($img, $theme);
        $this->drawDotGrid($img);
        $this->drawGlows($img, $theme);
        $this->drawFloatingOrbs($img, $theme);
        $this->drawRightPanel($img, $lang, $category, $theme);
        $this->drawCategoryTag($img, $lang, $category, $theme);
        $this->drawLangBadge($img, $lang);
        $this->drawTitle($img, $title, $theme);
        $this->drawBottomAccent($img, $theme);
        $this->drawBranding($img);

        imagejpeg($img, $path, 92);
        imagedestroy($img);

        return $filename;
    }

    // ── Theme detection ───────────────────────────────────────────────────────

    private function theme(string $slug, string $category): string
    {
        $hay = strtolower($slug . ' ' . $category);
        if (str_contains($hay, 'seo') || str_contains($hay, 'smm'))            return 'teal';
        if (str_contains($hay, 'pos') || str_contains($hay, 'anbar') || str_contains($hay, 'magaza') || str_contains($hay, 'restoran')) return 'orange';
        if (str_contains($hay, 'lms') || str_contains($hay, 'kurs') || str_contains($hay, 'tehsil'))  return 'indigo';
        if (str_contains($hay, 'logo') || str_contains($hay, 'brand'))         return 'rose';
        return 'violet';
    }

    private function themeColors(string $theme): array
    {
        return match($theme) {
            'teal'   => ['bg' => [5,28,42],   'mid' => [3,16,32],  'bot' => [2,7,20],   'glow1' => [0,190,160],  'glow2' => [0,100,120], 'accent' => [0,220,190],  'streak' => [0,180,150]],
            'orange' => ['bg' => [28,14,6],   'mid' => [20,10,4],  'bot' => [10,5,2],   'glow1' => [220,100,20], 'glow2' => [180,50,10], 'accent' => [255,140,40], 'streak' => [200,90,20]],
            'indigo' => ['bg' => [10,8,35],   'mid' => [7,5,25],   'bot' => [3,2,14],   'glow1' => [80,60,220],  'glow2' => [40,20,160], 'accent' => [120,100,255],'streak' => [70,50,200]],
            'rose'   => ['bg' => [28,6,16],   'mid' => [20,4,12],  'bot' => [10,2,6],   'glow1' => [220,40,100], 'glow2' => [160,20,70], 'accent' => [255,80,140], 'streak' => [200,30,90]],
            default  => ['bg' => [16,6,38],   'mid' => [10,4,28],  'bot' => [4,2,14],   'glow1' => [110,40,200], 'glow2' => [60,20,160], 'accent' => [150,80,255], 'streak' => [100,40,200]],
        };
    }

    // ── Background gradient ───────────────────────────────────────────────────

    private function drawBackground(\GdImage $img, string $theme): void
    {
        $c = $this->themeColors($theme);
        [$topR, $topG, $topB] = $c['bg'];
        [$midR, $midG, $midB] = $c['mid'];
        [$botR, $botG, $botB] = $c['bot'];

        for ($y = 0; $y < self::H; $y++) {
            $t = $y / self::H;
            if ($t < 0.5) {
                $t2 = $t * 2;
                $r  = (int)($topR + ($midR - $topR) * $t2);
                $g  = (int)($topG + ($midG - $topG) * $t2);
                $b  = (int)($topB + ($midB - $topB) * $t2);
            } else {
                $t2 = ($t - 0.5) * 2;
                $r  = (int)($midR + ($botR - $midR) * $t2);
                $g  = (int)($midG + ($botG - $midG) * $t2);
                $b  = (int)($midB + ($botB - $midB) * $t2);
            }
            $col = imagecolorallocate($img, $r, $g, $b);
            imageline($img, 0, $y, self::W, $y, $col);
        }
    }

    // ── Diagonal light streaks ────────────────────────────────────────────────

    private function drawDiagonalStreaks(\GdImage $img, string $theme): void
    {
        $c  = $this->themeColors($theme);
        [$sr, $sg, $sb] = $c['streak'];

        $streaks = [
            ['x1' => -100, 'y1' => 300,  'x2' => self::W * 0.7, 'y2' => -80,  'alpha' => 115, 'w' => 1],
            ['x1' => 0,    'y1' => 650,  'x2' => self::W * 0.5, 'y2' => 200,  'alpha' => 120, 'w' => 1],
            ['x1' => 200,  'y1' => self::H + 50, 'x2' => self::W * 0.85, 'y2' => 100, 'alpha' => 118, 'w' => 1],
        ];

        foreach ($streaks as $s) {
            // Draw thin streak with blur effect (3 lines with varying alpha)
            foreach ([-1, 0, 1] as $offset) {
                $alphaShift = $offset === 0 ? 0 : 8;
                $col = imagecolorallocatealpha($img, $sr, $sg, $sb, min(127, $s['alpha'] + $alphaShift));
                imageline($img, (int)$s['x1'] + $offset, (int)$s['y1'], (int)$s['x2'] + $offset, (int)$s['y2'], $col);
                imagecolordeallocate($img, $col);
            }
        }
    }

    // ── Dot grid overlay ─────────────────────────────────────────────────────

    private function drawDotGrid(\GdImage $img): void
    {
        $dot  = imagecolorallocatealpha($img, 255, 255, 255, 116);
        $step = 44;
        for ($x = $step; $x < self::W - 40; $x += $step) {
            for ($y = $step; $y < self::H - 40; $y += $step) {
                imagesetpixel($img, $x, $y, $dot);
            }
        }
    }

    // ── Radial glows ─────────────────────────────────────────────────────────

    private function drawGlows(\GdImage $img, string $theme): void
    {
        $c = $this->themeColors($theme);
        [$r1, $g1, $b1] = $c['glow1'];
        [$r2, $g2, $b2] = $c['glow2'];

        // Main left glow — larger and brighter
        $this->drawRadialGlow($img, 240, 490, 400, $r1, $g1, $b1, 0.55);
        // Secondary right glow
        $this->drawRadialGlow($img, self::W - 180, 260, 300, $r2, $g2, $b2, 0.40);
        // Small accent glow bottom-left
        $this->drawRadialGlow($img, 120, self::H - 80, 160, $r1, $g1, $b1, 0.30);
    }

    private function drawRadialGlow(\GdImage $img, int $cx, int $cy, int $radius, int $r, int $g, int $b, float $intensity = 0.45): void
    {
        $steps = 32;
        for ($i = $steps; $i >= 1; $i--) {
            $frac  = $i / $steps;
            $alpha = (int)(127 * (1 - $frac * $intensity));
            $cr    = imagecolorallocatealpha($img, $r, $g, $b, $alpha);
            $rad   = (int)($radius * $frac);
            imagefilledellipse($img, $cx, $cy, $rad * 2, (int)($rad * 1.3), $cr);
            imagecolordeallocate($img, $cr);
        }
    }

    // ── Floating decorative orbs ──────────────────────────────────────────────

    private function drawFloatingOrbs(\GdImage $img, string $theme): void
    {
        $c = $this->themeColors($theme);
        [$r, $g, $b] = $c['accent'];

        $orbs = [
            [self::W * 0.38, 90,  18, 105],
            [self::W * 0.52, 200, 10, 110],
            [self::W * 0.28, 820, 14, 108],
            [80,             160, 8,  112],
            [self::W * 0.62, 860, 12, 107],
        ];

        foreach ($orbs as [$ox, $oy, $size, $alpha]) {
            $col = imagecolorallocatealpha($img, $r, $g, $b, $alpha);
            imagefilledellipse($img, (int)$ox, (int)$oy, $size, $size, $col);
            // ring around orb
            $ring = imagecolorallocatealpha($img, $r, $g, $b, $alpha + 10);
            imagearc($img, (int)$ox, (int)$oy, $size + 6, $size + 6, 0, 360, $ring);
            imagecolordeallocate($img, $col);
            imagecolordeallocate($img, $ring);
        }
    }

    // ── Right decorative panel ────────────────────────────────────────────────

    private function drawRightPanel(\GdImage $img, string $lang, string $category, string $theme): void
    {
        $c  = $this->themeColors($theme);
        $px = self::W - 430;
        $py = 70;
        $pw = 370;
        $ph = 540;

        // Outer glow behind panel
        [$gr, $gg, $gb] = $c['glow2'];
        $this->drawRadialGlow($img, (int)($px + $pw / 2), (int)($py + $ph / 2), 220, $gr, $gg, $gb, 0.20);

        // Panel glass background
        $panelBg = imagecolorallocatealpha($img, 255, 255, 255, 112);
        $this->fillRoundedRect($img, $px, $py, $pw, $ph, 18, $panelBg);

        // Accent border
        [$ar, $ag, $ab] = $c['accent'];
        $border = imagecolorallocatealpha($img, $ar, $ag, $ab, 88);
        $this->drawRoundedRectOutline($img, $px, $py, $pw, $ph, 18, $border);

        // Top accent line inside panel
        $accentLine = imagecolorallocatealpha($img, $ar, $ag, $ab, 70);
        $this->fillRoundedRect($img, $px + 1, $py + 1, $pw - 2, 3, 1, $accentLine);

        // Header bar
        $headerBg = imagecolorallocatealpha($img, 10, 6, 30, 65);
        $this->fillRoundedRect($img, $px, $py, $pw, 38, 18, $headerBg);

        // macOS dots
        $dotColors = [
            imagecolorallocate($img, 255, 95, 87),
            imagecolorallocate($img, 255, 189, 46),
            imagecolorallocate($img, 40, 200, 64),
        ];
        foreach ($dotColors as $i => $dc) {
            imagefilledellipse($img, $px + 18 + $i * 22, $py + 19, 11, 11, $dc);
        }

        // Panel title
        $titleClr = imagecolorallocatealpha($img, $ar, $ag, $ab, 40);
        $label    = $this->panelTitle($lang, $category);
        $this->drawText($img, $this->fontBold, 11, $px + 90, $py + 25, $titleClr, $label);

        // Data rows
        $rows = $this->panelRows($lang, $category, $theme);
        $ry   = $py + 56;
        foreach ($rows as $row) {
            [$rowLabel, $rowVal, $barPct] = $row;

            $labelClr = imagecolorallocate($img, 155, 145, 195);
            $valClr   = imagecolorallocate($img, 235, 228, 255);
            $this->drawText($img, $this->fontBold, 10, $px + 16, $ry + 13, $labelClr, $rowLabel);
            $this->drawText($img, $this->fontBold, 10, $px + $pw - 16, $ry + 13, $valClr, $rowVal, true);

            // Bar background
            $barY  = $ry + 20;
            $barW  = $pw - 32;
            $barBg = imagecolorallocatealpha($img, 40, 30, 70, 80);
            $this->fillRoundedRect($img, $px + 16, $barY, $barW, 5, 2, $barBg);

            // Bar fill with accent color
            $fillW   = max(4, (int)($barW * $barPct));
            $barFill = imagecolorallocatealpha($img, $ar, $ag, $ab, 60);
            $this->fillRoundedRect($img, $px + 16, $barY, $fillW, 5, 2, $barFill);

            // Bright tip dot at bar end
            $tipCol = imagecolorallocatealpha($img, $ar, $ag, $ab, 30);
            imagefilledellipse($img, $px + 16 + $fillW, $barY + 2, 7, 7, $tipCol);

            $ry += 48;
        }

        // Mini bar chart
        $this->drawMiniChart($img, $px + 16, $py + $ph - 120, $pw - 32, 90, $c);

        // Bottom label in panel
        $bottomLbl = imagecolorallocatealpha($img, 160, 150, 200, 60);
        $this->drawText($img, $this->fontBold, 9, $px + 16, $py + $ph - 14, $bottomLbl, 'rs-code.az • 2026');
    }

    private function panelTitle(string $lang, string $category): string
    {
        $map = [
            'az' => ['pos' => 'Satış Analitika', 'seo' => 'SEO Göstəricilər', 'lms' => 'Kurs Statistikası', 'default' => 'Layihə Statistikası'],
            'en' => ['pos' => 'Sales Analytics',  'seo' => 'SEO Metrics',       'lms' => 'Course Statistics', 'default' => 'Project Statistics'],
            'ru' => ['pos' => 'Аналитика Продаж', 'seo' => 'SEO Показатели',    'lms' => 'Статистика Курсов','default' => 'Статистика Проекта'],
        ];
        $cat = strtolower($category);
        $key = str_contains($cat, 'pos') || str_contains($cat, 'anbar') || str_contains($cat, 'magaza') ? 'pos'
             : (str_contains($cat, 'seo') || str_contains($cat, 'smm') ? 'seo'
             : (str_contains($cat, 'lms') || str_contains($cat, 'kurs') ? 'lms' : 'default'));
        return $map[$lang][$key] ?? $map['az']['default'];
    }

    private function panelRows(string $lang, string $category, string $theme): array
    {
        $cat = strtolower($category);

        if (str_contains($cat, 'pos') || str_contains($cat, 'anbar') || str_contains($cat, 'magaza') || str_contains($cat, 'restoran')) {
            return [
                [['az'=>'Sürət','en'=>'Speed','ru'=>'Скорость'][$lang]??'Speed', '98%', 0.98],
                [['az'=>'Etibarlılıq','en'=>'Reliability','ru'=>'Надёжность'][$lang]??'Reliability', '99.9%', 0.999],
                [['az'=>'İnteqrasiya','en'=>'Integrations','ru'=>'Интеграции'][$lang]??'Integrations', '12+', 0.72],
                [['az'=>'Müştəri','en'=>'Clients','ru'=>'Клиенты'][$lang]??'Clients', '200+', 0.85],
                [['az'=>'Dəstək','en'=>'Support','ru'=>'Поддержка'][$lang]??'Support', '24/7', 1.0],
            ];
        }
        if (str_contains($cat, 'seo') || str_contains($cat, 'smm')) {
            return [
                [['az'=>'Trafik artımı','en'=>'Traffic boost','ru'=>'Рост трафика'][$lang]??'Traffic', '+320%', 0.92],
                [['az'=>'Açar söz','en'=>'Keywords','ru'=>'Ключевые слова'][$lang]??'Keywords', 'TOP 3', 0.78],
                [['az'=>'Dönüşüm','en'=>'Conversion','ru'=>'Конверсия'][$lang]??'Conv.', '4.8%', 0.68],
                [['az'=>'Sürət balı','en'=>'Speed score','ru'=>'Score'][$lang]??'Score', '96/100', 0.96],
                [['az'=>'DA skoru','en'=>'DA score','ru'=>'DA балл'][$lang]??'DA', '42', 0.60],
            ];
        }
        if (str_contains($cat, 'lms') || str_contains($cat, 'kurs')) {
            return [
                [['az'=>'Şagird','en'=>'Students','ru'=>'Студентов'][$lang]??'Students', '500+', 0.85],
                [['az'=>'Kurs','en'=>'Courses','ru'=>'Курсов'][$lang]??'Courses', '24', 0.72],
                [['az'=>'Tamamlanma','en'=>'Completion','ru'=>'Завершение'][$lang]??'Completion', '87%', 0.87],
                [['az'=>'Sertifikat','en'=>'Certificates','ru'=>'Сертификаты'][$lang]??'Certs', '320+', 0.80],
                [['az'=>'Reytinq','en'=>'Rating','ru'=>'Рейтинг'][$lang]??'Rating', '4.9/5', 0.98],
            ];
        }
        return [
            [['az'=>'Sürət balı','en'=>'Speed score','ru'=>'Score'][$lang]??'Score', '99/100', 0.99],
            [['az'=>'Responsiv','en'=>'Responsive','ru'=>'Адаптивность'][$lang]??'Responsive', '✓', 1.0],
            [['az'=>'Layihə','en'=>'Projects','ru'=>'Проекты'][$lang]??'Projects', '100+', 0.80],
            [['az'=>'Texnologiya','en'=>'Tech stack','ru'=>'Технологии'][$lang]??'Stack', '15+', 0.65],
            [['az'=>'Müştəri','en'=>'Clients','ru'=>'Клиенты'][$lang]??'Clients', '80+', 0.75],
        ];
    }

    private function drawMiniChart(\GdImage $img, int $x, int $y, int $w, int $h, array $c): void
    {
        [$ar, $ag, $ab] = $c['accent'];
        $barData = [0.35, 0.55, 0.45, 0.72, 0.58, 0.88, 0.70, 0.82, 0.95];
        $count   = count($barData);
        $gap     = 5;
        $barW    = (int)(($w - ($count - 1) * $gap) / $count);
        $bx      = $x;

        foreach ($barData as $i => $val) {
            $bh     = (int)($h * $val);
            $by     = $y + $h - $bh;

            // Bar body
            $alpha  = (int)(127 - 55 * $val);
            $barClr = imagecolorallocatealpha($img, $ar, $ag, $ab, $alpha);
            $this->fillRoundedRect($img, $bx, $by, $barW, $bh, 3, $barClr);

            // Bright top cap
            $capClr = imagecolorallocatealpha($img, $ar, $ag, $ab, max(30, $alpha - 25));
            $this->fillRoundedRect($img, $bx, $by, $barW, min(4, $bh), 2, $capClr);

            imagecolordeallocate($img, $barClr);
            imagecolordeallocate($img, $capClr);
            $bx += $barW + $gap;
        }

        // Baseline
        $base = imagecolorallocatealpha($img, $ar, $ag, $ab, 100);
        imageline($img, $x, $y + $h, $x + $w, $y + $h, $base);
    }

    // ── Category tag pill ─────────────────────────────────────────────────────

    private function drawCategoryTag(\GdImage $img, string $lang, string $category, string $theme): void
    {
        $c    = $this->themeColors($theme);
        [$ar, $ag, $ab] = $c['accent'];
        $text = strtoupper($this->categoryLabel($lang, $category)) . ' • 2026';
        $fontSize = 11;
        $bbox = imagettfbbox($fontSize, 0, $this->fontBold, $text);
        $tw   = abs($bbox[4] - $bbox[0]) + 34;
        $th   = 30;
        $tx   = 58;
        $ty   = 56;

        $pillBg = imagecolorallocatealpha($img, $ar, $ag, $ab, 96);
        $this->fillRoundedRect($img, $tx, $ty, $tw, $th, 15, $pillBg);
        $pillBorder = imagecolorallocatealpha($img, $ar, $ag, $ab, 55);
        $this->drawRoundedRectOutline($img, $tx, $ty, $tw, $th, 15, $pillBorder);

        $textClr = imagecolorallocate($img, 240, 255, 250);
        $this->drawText($img, $this->fontBold, $fontSize, $tx + 17, $ty + 20, $textClr, $text);
    }

    private function categoryLabel(string $lang, string $category): string
    {
        $cat = strtolower($category);
        if (str_contains($cat, 'pos') || str_contains($cat, 'magaza') || str_contains($cat, 'anbar'))
            return ['az'=>'Mağaza / POS', 'en'=>'Store / POS', 'ru'=>'Магазин / POS'][$lang] ?? 'POS';
        if (str_contains($cat, 'restoran'))
            return ['az'=>'Restoran POS', 'en'=>'Restaurant POS', 'ru'=>'Ресторан POS'][$lang] ?? 'POS';
        if (str_contains($cat, 'seo'))   return 'SEO';
        if (str_contains($cat, 'smm'))   return 'SMM';
        if (str_contains($cat, 'lms'))   return 'LMS';
        if (str_contains($cat, 'logo'))  return ['az'=>'Loqo', 'en'=>'Logo', 'ru'=>'Логотип'][$lang] ?? 'Logo';
        if (str_contains($cat, 'crm') || str_contains($cat, 'erp')) return 'CRM / ERP';
        return ['az'=>'Bloq', 'en'=>'Blog', 'ru'=>'Блог'][$lang] ?? 'Blog';
    }

    // ── Language badge ────────────────────────────────────────────────────────

    private function drawLangBadge(\GdImage $img, string $lang): void
    {
        $text = strtoupper($lang);
        $fontSize = 12;
        $bw = 48; $bh = 30;
        $bx = self::W - $bw - 58;
        $by = 56;

        $bg     = imagecolorallocatealpha($img, 90, 50, 180, 68);
        $border = imagecolorallocatealpha($img, 160, 110, 255, 55);
        $this->fillRoundedRect($img, $bx, $by, $bw, $bh, 8, $bg);
        $this->drawRoundedRectOutline($img, $bx, $by, $bw, $bh, 8, $border);

        $bbox  = imagettfbbox($fontSize, 0, $this->fontBold, $text);
        $tw    = abs($bbox[4] - $bbox[0]);
        $textX = $bx + (int)(($bw - $tw) / 2);
        $clr   = imagecolorallocate($img, 225, 215, 255);
        $this->drawText($img, $this->fontBold, $fontSize, $textX, $by + 20, $clr, $text);
    }

    // ── Title text ────────────────────────────────────────────────────────────

    private function drawTitle(\GdImage $img, string $title, string $theme): void
    {
        $c        = $this->themeColors($theme);
        $maxWidth = self::W - 460 - 58;
        $startX   = 58;
        $fontSize = 60;
        $minFont  = 34;

        while ($fontSize >= $minFont) {
            $lines = $this->wrapText($title, $fontSize, $maxWidth);
            if (count($lines) <= 4) break;
            $fontSize -= 4;
        }

        $lines      = $this->wrapText($title, $fontSize, $maxWidth);
        $lineHeight = (int)($fontSize * 1.20);
        $totalH     = count($lines) * $lineHeight;
        $startY     = max(130, (int)((self::H * 0.48) - ($totalH / 2)));
        $startY     = min($startY, self::H - $totalH - 110);

        // Accent bar before first line
        [$ar, $ag, $ab] = $c['accent'];
        $barClr = imagecolorallocatealpha($img, $ar, $ag, $ab, 50);
        $this->fillRoundedRect($img, $startX, $startY - 4, 5, $totalH + $lineHeight - 4, 2, $barClr);

        foreach ($lines as $i => $line) {
            $ly = $startY + $i * $lineHeight + $lineHeight;

            // Subtle shadow
            $shadow = imagecolorallocatealpha($img, 0, 0, 0, 55);
            $this->drawText($img, $this->fontBold, $fontSize, $startX + 18, $ly + 3, $shadow, $line);

            // White text
            $white = imagecolorallocate($img, 255, 255, 255);
            $this->drawText($img, $this->fontBold, $fontSize, $startX + 16, $ly, $white, $line);
        }
    }

    private function wrapText(string $text, float $fontSize, int $maxWidth): array
    {
        $words   = explode(' ', $text);
        $lines   = [];
        $current = '';

        foreach ($words as $word) {
            $test = $current ? "$current $word" : $word;
            $bbox = imagettfbbox($fontSize, 0, $this->fontBold, $test);
            $tw   = abs($bbox[4] - $bbox[0]);
            if ($tw > $maxWidth && $current !== '') {
                $lines[] = $current;
                $current = $word;
            } else {
                $current = $test;
            }
        }
        if ($current !== '') $lines[] = $current;
        return $lines;
    }

    // ── Bottom accent bar ─────────────────────────────────────────────────────

    private function drawBottomAccent(\GdImage $img, string $theme): void
    {
        $c = $this->themeColors($theme);
        [$ar, $ag, $ab] = $c['accent'];

        // Thin gradient line at very bottom
        for ($x = 0; $x < self::W; $x++) {
            $frac  = $x / self::W;
            $alpha = (int)(80 + 40 * abs($frac - 0.5) * 2);
            $col   = imagecolorallocatealpha($img, $ar, $ag, $ab, min(127, $alpha));
            imageline($img, $x, self::H - 3, $x, self::H - 1, $col);
            imagecolordeallocate($img, $col);
        }
    }

    // ── RS Code branding ──────────────────────────────────────────────────────

    private function drawBranding(\GdImage $img): void
    {
        $bx = 58;
        $by = self::H - 52;

        if (file_exists($this->logoPath)) {
            $logo = @imagecreatefrompng($this->logoPath);
            if ($logo) {
                $lw = imagesx($logo);
                $lh = imagesy($logo);
                $targetH = 28;
                $targetW = (int)($lw * $targetH / $lh);
                imagealphablending($img, true);
                imagecopyresampled($img, $logo, $bx, $by - $targetH, 0, 0, $targetW, $targetH, $lw, $lh);
                imagedestroy($logo);
                $bx += $targetW + 14;
            }
        }

        $divClr = imagecolorallocatealpha($img, 180, 160, 255, 75);
        imagefilledellipse($img, $bx, $by - 13, 4, 4, $divClr);
        $bx += 12;

        $domainClr = imagecolorallocatealpha($img, 200, 185, 255, 28);
        $this->drawText($img, $this->fontBold, 13, $bx, $by - 5, $domainClr, 'rs-code.az');
    }

    // ── Drawing helpers ───────────────────────────────────────────────────────

    private function drawText(\GdImage $img, string $font, float $size, int $x, int $y, int $color, string $text, bool $rightAlign = false): void
    {
        if ($rightAlign) {
            $bbox = imagettfbbox($size, 0, $font, $text);
            $x   -= abs($bbox[4] - $bbox[0]);
        }
        imagettftext($img, $size, 0, $x, $y, $color, $font, $text);
    }

    private function fillRoundedRect(\GdImage $img, int $x, int $y, int $w, int $h, int $r, int $color): void
    {
        $r = min($r, (int)($w / 2), (int)($h / 2));
        imagefilledrectangle($img, $x + $r, $y,      $x + $w - $r, $y + $h,      $color);
        imagefilledrectangle($img, $x,      $y + $r, $x + $w,      $y + $h - $r, $color);
        imagefilledellipse($img, $x + $r,      $y + $r,      $r * 2, $r * 2, $color);
        imagefilledellipse($img, $x + $w - $r, $y + $r,      $r * 2, $r * 2, $color);
        imagefilledellipse($img, $x + $r,      $y + $h - $r, $r * 2, $r * 2, $color);
        imagefilledellipse($img, $x + $w - $r, $y + $h - $r, $r * 2, $r * 2, $color);
    }

    private function drawRoundedRectOutline(\GdImage $img, int $x, int $y, int $w, int $h, int $r, int $color): void
    {
        $r = min($r, (int)($w / 2), (int)($h / 2));
        imageline($img, $x + $r,     $y,         $x + $w - $r, $y,          $color);
        imageline($img, $x + $r,     $y + $h,    $x + $w - $r, $y + $h,     $color);
        imageline($img, $x,          $y + $r,    $x,           $y + $h - $r, $color);
        imageline($img, $x + $w,     $y + $r,    $x + $w,      $y + $h - $r, $color);
        imagearc($img, $x + $r,      $y + $r,      $r * 2, $r * 2, 180, 270, $color);
        imagearc($img, $x + $w - $r, $y + $r,      $r * 2, $r * 2, 270, 360, $color);
        imagearc($img, $x + $r,      $y + $h - $r, $r * 2, $r * 2,  90, 180, $color);
        imagearc($img, $x + $w - $r, $y + $h - $r, $r * 2, $r * 2,   0,  90, $color);
    }
}
