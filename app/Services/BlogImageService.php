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

        $this->drawBackground($img, $slug);
        $this->drawDotGrid($img);
        $this->drawGlows($img, $slug);
        $this->drawRightPanel($img, $lang, $category);
        $this->drawCategoryTag($img, $lang, $category);
        $this->drawLangBadge($img, $lang);
        $this->drawTitle($img, $title);
        $this->drawBranding($img);

        imagejpeg($img, $path, 90);
        imagedestroy($img);

        return $filename;
    }

    // ── Background gradient ───────────────────────────────────────────────────

    private function drawBackground(\GdImage $img, string $slug): void
    {
        $isTeal = str_contains($slug, 'seo') || str_contains($slug, 'smm') || str_contains($slug, 'sosial');

        if ($isTeal) {
            // Deep teal → navy
            $topR = 5;  $topG = 30; $topB = 45;
            $midR = 3;  $midG = 18; $midB = 35;
            $botR = 2;  $botG = 8;  $botB = 22;
        } else {
            // Deep violet → near-black
            $topR = 18; $topG = 8;  $topB = 40;
            $midR = 10; $midG = 4;  $midB = 28;
            $botR = 4;  $botG = 2;  $botB = 14;
        }

        for ($y = 0; $y < self::H; $y++) {
            $t = $y / self::H;
            if ($t < 0.5) {
                $t2 = $t * 2;
                $r  = (int) ($topR + ($midR - $topR) * $t2);
                $g  = (int) ($topG + ($midG - $topG) * $t2);
                $b  = (int) ($topB + ($midB - $topB) * $t2);
            } else {
                $t2 = ($t - 0.5) * 2;
                $r  = (int) ($midR + ($botR - $midR) * $t2);
                $g  = (int) ($midG + ($botG - $midG) * $t2);
                $b  = (int) ($midB + ($botB - $midB) * $t2);
            }
            $c = imagecolorallocate($img, $r, $g, $b);
            imageline($img, 0, $y, self::W, $y, $c);
        }
    }

    // ── Dot grid overlay ─────────────────────────────────────────────────────

    private function drawDotGrid(\GdImage $img): void
    {
        $dot = imagecolorallocatealpha($img, 255, 255, 255, 118);
        $step = 40;
        for ($x = $step; $x < self::W - 40; $x += $step) {
            for ($y = $step; $y < self::H - 40; $y += $step) {
                imagesetpixel($img, $x, $y, $dot);
            }
        }
    }

    // ── Radial glows ─────────────────────────────────────────────────────────

    private function drawGlows(\GdImage $img, string $slug): void
    {
        $isTeal = str_contains($slug, 'seo') || str_contains($slug, 'smm') || str_contains($slug, 'sosial');

        // Left glow — violet or teal
        if ($isTeal) {
            $this->drawRadialGlow($img, 280, 512, 340, 0, 180, 120);
        } else {
            $this->drawRadialGlow($img, 280, 512, 340, 100, 30, 180);
        }

        // Right glow — indigo
        $this->drawRadialGlow($img, self::W - 200, 300, 260, 60, 20, 160);
    }

    private function drawRadialGlow(\GdImage $img, int $cx, int $cy, int $radius, int $r, int $g, int $b): void
    {
        $steps = 28;
        for ($i = $steps; $i >= 1; $i--) {
            $frac  = $i / $steps;
            $alpha = (int) (127 * (1 - $frac * 0.38));
            $cr    = imagecolorallocatealpha($img, $r, $g, $b, $alpha);
            $rad   = (int) ($radius * $frac);
            imagefilledellipse($img, $cx, $cy, $rad * 2, (int) ($rad * 1.4), $cr);
            imagecolordeallocate($img, $cr);
        }
    }

    // ── Right decorative panel ────────────────────────────────────────────────

    private function drawRightPanel(\GdImage $img, string $lang, string $category): void
    {
        $px = self::W - 420;
        $py = 80;
        $pw = 360;
        $ph = 520;

        // Panel background
        $panelBg = imagecolorallocatealpha($img, 255, 255, 255, 110);
        $this->fillRoundedRect($img, $px, $py, $pw, $ph, 16, $panelBg);

        // Panel border
        $border = imagecolorallocatealpha($img, 130, 100, 220, 90);
        $this->drawRoundedRectOutline($img, $px, $py, $pw, $ph, 16, $border);

        // Header bar with dots
        $headerBg = imagecolorallocatealpha($img, 20, 12, 50, 70);
        $this->fillRoundedRect($img, $px, $py, $pw, 36, 16, $headerBg);

        $dotColors = [
            imagecolorallocate($img, 255, 95, 87),
            imagecolorallocate($img, 255, 189, 46),
            imagecolorallocate($img, 40, 200, 64),
        ];
        foreach ($dotColors as $i => $dc) {
            imagefilledellipse($img, $px + 18 + $i * 20, $py + 18, 10, 10, $dc);
        }

        // Panel title
        $titleClr = imagecolorallocate($img, 180, 160, 255);
        $label    = $this->panelTitle($lang, $category);
        $this->drawText($img, $this->fontBold, 11, $px + 80, $py + 24, $titleClr, $label);

        // Data rows
        $rows = $this->panelRows($lang, $category);
        $ry   = $py + 56;
        foreach ($rows as $row) {
            [$rowLabel, $rowVal, $barPct] = $row;

            $labelClr = imagecolorallocate($img, 160, 150, 200);
            $valClr   = imagecolorallocate($img, 230, 225, 255);
            $this->drawText($img, $this->fontBold, 10, $px + 14, $ry + 12, $labelClr, $rowLabel);
            $this->drawText($img, $this->fontBold,    10, $px + $pw - 14, $ry + 12, $valClr, $rowVal, true);

            // Bar
            $barY  = $ry + 18;
            $barW  = $pw - 28;
            $barBg = imagecolorallocatealpha($img, 60, 50, 90, 80);
            $this->fillRoundedRect($img, $px + 14, $barY, $barW, 5, 2, $barBg);
            $barFill = imagecolorallocate($img, 130, 80, 220);
            $fillW   = max(4, (int) ($barW * $barPct));
            $this->fillRoundedRect($img, $px + 14, $barY, $fillW, 5, 2, $barFill);

            $ry += 46;
        }

        // Mini bar chart at bottom of panel
        $this->drawMiniChart($img, $px + 14, $py + $ph - 110, $pw - 28, 80);
    }

    private function panelTitle(string $lang, string $category): string
    {
        $map = [
            'az' => ['pos' => 'POS Analitika', 'seo' => 'SEO Göstəricilər', 'default' => 'Layihə Statistikası'],
            'en' => ['pos' => 'POS Analytics',  'seo' => 'SEO Metrics',       'default' => 'Project Statistics'],
            'ru' => ['pos' => 'POS Аналитика',  'seo' => 'SEO Показатели',    'default' => 'Статистика Проекта'],
        ];
        $cat = strtolower($category);
        $key = str_contains($cat, 'pos') ? 'pos' : (str_contains($cat, 'seo') ? 'seo' : 'default');
        return $map[$lang][$key] ?? $map['az']['default'];
    }

    private function panelRows(string $lang, string $category): array
    {
        $cat = strtolower($category);

        if (str_contains($cat, 'pos')) {
            return [
                [['az' => 'Sürət', 'en' => 'Speed',    'ru' => 'Скорость'][$lang] ?? 'Speed',    '98%',  0.98],
                [['az' => 'Etibarlılıq', 'en' => 'Reliability', 'ru' => 'Надёжность'][$lang] ?? 'Reliability', '99.9%', 0.999],
                [['az' => 'İnteqrasiya', 'en' => 'Integration', 'ru' => 'Интеграция'][$lang] ?? 'Integration', '12+',   0.72],
                [['az' => 'Müştəri',     'en' => 'Clients',     'ru' => 'Клиенты'][$lang]   ?? 'Clients',    '200+',  0.85],
                [['az' => 'Dəstək',      'en' => 'Support',     'ru' => 'Поддержка'][$lang]  ?? 'Support',   '24/7',  1.0],
            ];
        }

        if (str_contains($cat, 'seo') || str_contains($cat, 'smm')) {
            return [
                [['az' => 'Trafik artımı', 'en' => 'Traffic boost', 'ru' => 'Рост трафика'][$lang] ?? 'Traffic', '+320%', 0.92],
                [['az' => 'Açar söz',      'en' => 'Keywords',      'ru' => 'Ключевые слова'][$lang] ?? 'Keywords', 'TOP 3',  0.78],
                [['az' => 'Dönüşüm',       'en' => 'Conversion',    'ru' => 'Конверсия'][$lang]      ?? 'Conv.',   '4.8%',  0.68],
                [['az' => 'Sürət balı',    'en' => 'Speed score',   'ru' => 'Score скорости'][$lang] ?? 'Speed',  '96/100',0.96],
                [['az' => 'DA skoru',      'en' => 'DA score',      'ru' => 'DA балл'][$lang]         ?? 'DA',     '42',    0.60],
            ];
        }

        // default — web dev
        return [
            [['az' => 'Sürət balı',  'en' => 'Speed score',  'ru' => 'Score'][$lang]   ?? 'Score',   '99/100', 0.99],
            [['az' => 'Responsiv',   'en' => 'Responsive',   'ru' => 'Адаптивность'][$lang] ?? 'Responsive', '✓',  1.0],
            [['az' => 'Layihə',      'en' => 'Projects',     'ru' => 'Проекты'][$lang]  ?? 'Projects', '100+',  0.80],
            [['az' => 'Texnologiya', 'en' => 'Tech stack',   'ru' => 'Технологии'][$lang] ?? 'Stack',  '15+',   0.65],
            [['az' => 'Müştəri',     'en' => 'Clients',      'ru' => 'Клиенты'][$lang]  ?? 'Clients', '80+',   0.75],
        ];
    }

    private function drawMiniChart(\GdImage $img, int $x, int $y, int $w, int $h): void
    {
        $barData = [0.4, 0.65, 0.5, 0.8, 0.6, 0.9, 0.75, 0.85];
        $count   = count($barData);
        $barW    = (int) (($w - ($count - 1) * 4) / $count);
        $bx      = $x;

        foreach ($barData as $val) {
            $bh     = (int) ($h * $val);
            $by     = $y + $h - $bh;
            $alpha  = 60 + (int) (50 * $val);
            $barClr = imagecolorallocatealpha($img, 120, 70, 220, 127 - $alpha);
            $this->fillRoundedRect($img, $bx, $by, $barW, $bh, 3, $barClr);
            $bx += $barW + 4;
        }
    }

    // ── Category tag pill ─────────────────────────────────────────────────────

    private function drawCategoryTag(\GdImage $img, string $lang, string $category): void
    {
        $text    = strtoupper($this->categoryLabel($lang, $category)) . ' • 2026';
        $fontSize = 11;
        $bbox    = imagettfbbox($fontSize, 0, $this->fontBold, $text);
        $tw      = abs($bbox[4] - $bbox[0]) + 32;
        $th      = 28;
        $tx      = 60;
        $ty      = 60;

        // Pill background
        $pillBg = imagecolorallocatealpha($img, 0, 200, 180, 90);
        $this->fillRoundedRect($img, $tx, $ty, $tw, $th, 14, $pillBg);

        // Pill border
        $pillBorder = imagecolorallocatealpha($img, 0, 220, 200, 60);
        $this->drawRoundedRectOutline($img, $tx, $ty, $tw, $th, 14, $pillBorder);

        $textClr = imagecolorallocate($img, 220, 255, 250);
        $this->drawText($img, $this->fontBold, $fontSize, $tx + 16, $ty + 18, $textClr, $text);
    }

    private function categoryLabel(string $lang, string $category): string
    {
        $cat = strtolower($category);
        if (str_contains($cat, 'pos'))   return ['az' => 'POS Sistem',  'en' => 'POS System',  'ru' => 'POS Система'][$lang] ?? 'POS';
        if (str_contains($cat, 'seo'))   return ['az' => 'SEO',         'en' => 'SEO',          'ru' => 'SEO'][$lang]         ?? 'SEO';
        if (str_contains($cat, 'smm'))   return ['az' => 'SMM',         'en' => 'SMM',          'ru' => 'SMM'][$lang]         ?? 'SMM';
        if (str_contains($cat, 'lms'))   return ['az' => 'LMS',         'en' => 'LMS',          'ru' => 'LMS'][$lang]         ?? 'LMS';
        if (str_contains($cat, 'logo'))  return ['az' => 'Loqo',        'en' => 'Logo',         'ru' => 'Логотип'][$lang]     ?? 'Logo';
        return ['az' => 'Bloq', 'en' => 'Blog', 'ru' => 'Блог'][$lang] ?? 'Blog';
    }

    // ── Language badge ────────────────────────────────────────────────────────

    private function drawLangBadge(\GdImage $img, string $lang): void
    {
        $text    = strtoupper($lang);
        $fontSize = 12;
        $bw      = 46;
        $bh      = 28;
        $bx      = self::W - $bw - 60;
        $by      = 60;

        $bg     = imagecolorallocatealpha($img, 100, 60, 200, 70);
        $border = imagecolorallocatealpha($img, 150, 100, 255, 60);
        $this->fillRoundedRect($img, $bx, $by, $bw, $bh, 8, $bg);
        $this->drawRoundedRectOutline($img, $bx, $by, $bw, $bh, 8, $border);

        $bbox  = imagettfbbox($fontSize, 0, $this->fontBold, $text);
        $tw    = abs($bbox[4] - $bbox[0]);
        $textX = $bx + (int) (($bw - $tw) / 2);
        $textY = $by + 19;
        $clr   = imagecolorallocate($img, 220, 210, 255);
        $this->drawText($img, $this->fontBold, $fontSize, $textX, $textY, $clr, $text);
    }

    // ── Title text ────────────────────────────────────────────────────────────

    private function drawTitle(\GdImage $img, string $title): void
    {
        $maxWidth  = self::W - 460 - 60;  // leave room for right panel
        $startX    = 60;
        $startY    = 140;
        $fontSize  = 58;
        $lineHeight = 72;
        $minFont   = 36;

        // Shrink font until text fits
        while ($fontSize >= $minFont) {
            $lines = $this->wrapText($title, $fontSize, $maxWidth);
            if (count($lines) <= 4) {
                break;
            }
            $fontSize -= 4;
        }

        $lines      = $this->wrapText($title, $fontSize, $maxWidth);
        $lineHeight = (int) ($fontSize * 1.22);
        $totalH     = count($lines) * $lineHeight;
        $startY     = (int) ((self::H * 0.5) - ($totalH / 2) + 20);
        $startY     = max(130, min($startY, self::H - $totalH - 100));

        foreach ($lines as $i => $line) {
            $ly = $startY + $i * $lineHeight + $lineHeight;

            // Shadow
            $shadow = imagecolorallocatealpha($img, 0, 0, 0, 60);
            $this->drawText($img, $this->fontBold, $fontSize, $startX + 2, $ly + 3, $shadow, $line);

            // White text
            $white = imagecolorallocate($img, 255, 255, 255);
            $this->drawText($img, $this->fontBold, $fontSize, $startX, $ly, $white, $line);
        }
    }

    private function wrapText(string $text, float $fontSize, int $maxWidth): array
    {
        $words  = explode(' ', $text);
        $lines  = [];
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
        if ($current !== '') {
            $lines[] = $current;
        }

        return $lines;
    }

    // ── RS Code branding ──────────────────────────────────────────────────────

    private function drawBranding(\GdImage $img): void
    {
        $bx = 60;
        $by = self::H - 60;

        // Logo PNG
        if (file_exists($this->logoPath)) {
            $logo = @imagecreatefrompng($this->logoPath);
            if ($logo) {
                $lw = imagesx($logo);
                $lh = imagesy($logo);
                $targetH = 28;
                $targetW = (int) ($lw * $targetH / $lh);
                imagealphablending($img, true);
                imagecopyresampled($img, $logo, $bx, $by - $targetH, 0, 0, $targetW, $targetH, $lw, $lh);
                imagedestroy($logo);
                $bx += $targetW + 12;
            }
        }

        // Divider dot
        $divClr = imagecolorallocatealpha($img, 180, 160, 255, 80);
        imagefilledellipse($img, $bx, $by - 14, 4, 4, $divClr);
        $bx += 12;

        // Domain
        $domainClr = imagecolorallocatealpha($img, 200, 185, 255, 30);
        $this->drawText($img, $this->fontBold, 13, $bx, $by - 6, $domainClr, 'rs-code.az');
    }

    // ── Drawing helpers ───────────────────────────────────────────────────────

    private function drawText(\GdImage $img, string $font, float $size, int $x, int $y, int $color, string $text, bool $rightAlign = false): void
    {
        if ($rightAlign) {
            $bbox = imagettfbbox($size, 0, $font, $text);
            $tw   = abs($bbox[4] - $bbox[0]);
            $x   -= $tw;
        }
        imagettftext($img, $size, 0, $x, $y, $color, $font, $text);
    }

    private function fillRoundedRect(\GdImage $img, int $x, int $y, int $w, int $h, int $r, int $color): void
    {
        $r = min($r, (int) ($w / 2), (int) ($h / 2));

        imagefilledrectangle($img, $x + $r, $y,       $x + $w - $r, $y + $h,      $color);
        imagefilledrectangle($img, $x,      $y + $r,  $x + $w,      $y + $h - $r, $color);

        imagefilledellipse($img, $x + $r,       $y + $r,       $r * 2, $r * 2, $color);
        imagefilledellipse($img, $x + $w - $r,  $y + $r,       $r * 2, $r * 2, $color);
        imagefilledellipse($img, $x + $r,       $y + $h - $r,  $r * 2, $r * 2, $color);
        imagefilledellipse($img, $x + $w - $r,  $y + $h - $r,  $r * 2, $r * 2, $color);
    }

    private function drawRoundedRectOutline(\GdImage $img, int $x, int $y, int $w, int $h, int $r, int $color): void
    {
        $r = min($r, (int) ($w / 2), (int) ($h / 2));

        imageline($img, $x + $r,      $y,          $x + $w - $r,  $y,          $color);
        imageline($img, $x + $r,      $y + $h,     $x + $w - $r,  $y + $h,     $color);
        imageline($img, $x,           $y + $r,     $x,            $y + $h - $r, $color);
        imageline($img, $x + $w,      $y + $r,     $x + $w,       $y + $h - $r, $color);

        imagearc($img, $x + $r,      $y + $r,      $r * 2, $r * 2, 180, 270, $color);
        imagearc($img, $x + $w - $r, $y + $r,      $r * 2, $r * 2, 270, 360, $color);
        imagearc($img, $x + $r,      $y + $h - $r, $r * 2, $r * 2,  90, 180, $color);
        imagearc($img, $x + $w - $r, $y + $h - $r, $r * 2, $r * 2,   0,  90, $color);
    }
}
