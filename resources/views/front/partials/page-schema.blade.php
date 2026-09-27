{{-- Xidmət / məlumat səhifələri üçün Service + BreadcrumbList schema. Parametrlər: $key (meta.* açarı), $service (bool) --}}
@php
    $pageUrl  = 'https://rs-code.az' . strtok(request()->getRequestUri(), '?');
    $pageName = trim(explode('|', __('meta.' . $key . '.title'))[0]);
    $homeName = ['az' => 'Ana səhifə', 'en' => 'Home', 'ru' => 'Главная'][app()->getLocale()] ?? 'Ana səhifə';

    $graph = [[
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => $homeName, 'item' => 'https://rs-code.az/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => $pageName, 'item' => $pageUrl],
        ],
    ]];

    if ($service ?? false) {
        $graph[] = [
            '@type'       => 'Service',
            'name'        => $pageName,
            'description' => __('meta.' . $key . '.desc'),
            'url'         => $pageUrl,
            'provider'    => [
                '@type'     => 'ProfessionalService',
                'name'      => 'RS Code',
                'url'       => 'https://rs-code.az',
                'telephone' => '+994775829989',
                'address'   => ['@type' => 'PostalAddress', 'addressLocality' => 'Bakı', 'addressCountry' => 'AZ'],
            ],
            'areaServed'  => ['@type' => 'Country', 'name' => 'Azerbaijan'],
        ];
    }

    $schemaJson = json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp
@push('head_extra')
<script type="application/ld+json">{!! $schemaJson !!}</script>
@endpush
