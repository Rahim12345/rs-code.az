<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB, Validator;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;

class IndexController extends Controller
{
    public function index()
    {
        $data['about']    = DB::table('abouts')->first();
        $data['partners'] = DB::table('partners')->get();
        $data['blogs']    = DB::table('blogs')->orderByDesc('id')->limit(6)->get();
        $data['comments'] = DB::table('comments')->get();
        $data['projects'] = Project::where('home',1)->orderBy('order_no','asc')->limit(3)->get();
        $data['services'] = Service::where('on_home',1)->orderBy('order_no','asc')->get();
        $data['team']     = Team::orderBy('order_no','asc')->get();
        return view('front.index', $data);
    }


    public function lang($lang)
    {
        \Session::put('lang', $lang);

        // Map every slug to its equivalents in all three languages.
        // Format: 'any-slug' => ['az' => '...', 'en' => '...', 'ru' => '...']
        $slugMap = [
            // About
            'haqqimizda' => ['az' => '/haqqimizda', 'en' => '/about',      'ru' => '/o-nas'],
            'about'      => ['az' => '/haqqimizda', 'en' => '/about',      'ru' => '/o-nas'],
            'o-nas'      => ['az' => '/haqqimizda', 'en' => '/about',      'ru' => '/o-nas'],
            // Contact
            'elaqe'    => ['az' => '/elaqe',   'en' => '/contact',  'ru' => '/kontakty'],
            'contact'  => ['az' => '/elaqe',   'en' => '/contact',  'ru' => '/kontakty'],
            'kontakty' => ['az' => '/elaqe',   'en' => '/contact',  'ru' => '/kontakty'],
            // Portfolio
            'isler'        => ['az' => '/isler', 'en' => '/portfolio',    'ru' => '/portfolio-ru'],
            'portfolio'    => ['az' => '/isler', 'en' => '/portfolio',    'ru' => '/portfolio-ru'],
            'portfolio-ru' => ['az' => '/isler', 'en' => '/portfolio',    'ru' => '/portfolio-ru'],
            // Blogs
            'bloqlar' => ['az' => '/bloqlar', 'en' => '/blogs', 'ru' => '/blogi'],
            'blogs'   => ['az' => '/bloqlar', 'en' => '/blogs', 'ru' => '/blogi'],
            'blogi'   => ['az' => '/bloqlar', 'en' => '/blogs', 'ru' => '/blogi'],
            // FAQ
            'suallar'                   => ['az' => '/suallar', 'en' => '/faq', 'ru' => '/chasto-zadavaemye-voprosy'],
            'faq'                       => ['az' => '/suallar', 'en' => '/faq', 'ru' => '/chasto-zadavaemye-voprosy'],
            'chasto-zadavaemye-voprosy' => ['az' => '/suallar', 'en' => '/faq', 'ru' => '/chasto-zadavaemye-voprosy'],
            // Services listing
            'xidmetler' => ['az' => '/xidmetler', 'en' => '/services', 'ru' => '/uslugi'],
            'services'  => ['az' => '/xidmetler', 'en' => '/services', 'ru' => '/uslugi'],
            'uslugi'    => ['az' => '/xidmetler', 'en' => '/services', 'ru' => '/uslugi'],
            // Web development
            'veb-saytlarin-hazirlanmasi' => ['az' => '/veb-saytlarin-hazirlanmasi', 'en' => '/website-development', 'ru' => '/razrabotka-sajtov'],
            'website-development'        => ['az' => '/veb-saytlarin-hazirlanmasi', 'en' => '/website-development', 'ru' => '/razrabotka-sajtov'],
            'razrabotka-sajtov'          => ['az' => '/veb-saytlarin-hazirlanmasi', 'en' => '/website-development', 'ru' => '/razrabotka-sajtov'],
            // SEO
            'seo-xidmeti'  => ['az' => '/seo-xidmeti', 'en' => '/seo-services', 'ru' => '/seo-uslugi'],
            'seo-services' => ['az' => '/seo-xidmeti', 'en' => '/seo-services', 'ru' => '/seo-uslugi'],
            'seo-uslugi'   => ['az' => '/seo-xidmeti', 'en' => '/seo-services', 'ru' => '/seo-uslugi'],
            // SMM
            'smm-xidmeti'  => ['az' => '/smm-xidmeti', 'en' => '/smm-services', 'ru' => '/smm-uslugi'],
            'smm-services' => ['az' => '/smm-xidmeti', 'en' => '/smm-services', 'ru' => '/smm-uslugi'],
            'smm-uslugi'   => ['az' => '/smm-xidmeti', 'en' => '/smm-services', 'ru' => '/smm-uslugi'],
            // Google Ads
            'google-reklamlari' => ['az' => '/google-reklamlari', 'en' => '/google-ads', 'ru' => '/reklama-google'],
            'google-ads'        => ['az' => '/google-reklamlari', 'en' => '/google-ads', 'ru' => '/reklama-google'],
            'reklama-google'    => ['az' => '/google-reklamlari', 'en' => '/google-ads', 'ru' => '/reklama-google'],
            // Logo
            'loqo-hazirlanmasi' => ['az' => '/loqo-hazirlanmasi', 'en' => '/logo-design', 'ru' => '/razrabotka-logo'],
            'logo-design'       => ['az' => '/loqo-hazirlanmasi', 'en' => '/logo-design', 'ru' => '/razrabotka-logo'],
            'razrabotka-logo'   => ['az' => '/loqo-hazirlanmasi', 'en' => '/logo-design', 'ru' => '/razrabotka-logo'],
            // Technical support
            'texniki-destek'            => ['az' => '/texniki-destek', 'en' => '/technical-support', 'ru' => '/tekhnicheskaya-podderzhka'],
            'technical-support'         => ['az' => '/texniki-destek', 'en' => '/technical-support', 'ru' => '/tekhnicheskaya-podderzhka'],
            'tekhnicheskaya-podderzhka' => ['az' => '/texniki-destek', 'en' => '/technical-support', 'ru' => '/tekhnicheskaya-podderzhka'],
            // Corporate email
            'korporativ-email'    => ['az' => '/korporativ-email', 'en' => '/corporate-email', 'ru' => '/korporativnaya-pochta'],
            'corporate-email'     => ['az' => '/korporativ-email', 'en' => '/corporate-email', 'ru' => '/korporativnaya-pochta'],
            'korporativnaya-pochta' => ['az' => '/korporativ-email', 'en' => '/corporate-email', 'ru' => '/korporativnaya-pochta'],
            // Facebook/Instagram
            'facebook-ve-instagram-reklamlari' => ['az' => '/facebook-ve-instagram-reklamlari', 'en' => '/facebook-instagram-ads', 'ru' => '/reklama-facebook-instagram'],
            'facebook-instagram-ads'            => ['az' => '/facebook-ve-instagram-reklamlari', 'en' => '/facebook-instagram-ads', 'ru' => '/reklama-facebook-instagram'],
            'reklama-facebook-instagram'        => ['az' => '/facebook-ve-instagram-reklamlari', 'en' => '/facebook-instagram-ads', 'ru' => '/reklama-facebook-instagram'],
            // Backlink
            'backlink-nedir'    => ['az' => '/backlink-nedir', 'en' => '/what-is-backlink', 'ru' => '/chto-takoe-backlink'],
            'what-is-backlink'  => ['az' => '/backlink-nedir', 'en' => '/what-is-backlink', 'ru' => '/chto-takoe-backlink'],
            'chto-takoe-backlink' => ['az' => '/backlink-nedir', 'en' => '/what-is-backlink', 'ru' => '/chto-takoe-backlink'],
            // Domain
            'domen-nedir'      => ['az' => '/domen-nedir', 'en' => '/what-is-domain', 'ru' => '/chto-takoe-domen'],
            'what-is-domain'   => ['az' => '/domen-nedir', 'en' => '/what-is-domain', 'ru' => '/chto-takoe-domen'],
            'chto-takoe-domen' => ['az' => '/domen-nedir', 'en' => '/what-is-domain', 'ru' => '/chto-takoe-domen'],
            // SSL
            'ssl-sertifikati-nedir'    => ['az' => '/ssl-sertifikati-nedir', 'en' => '/what-is-ssl-certificate', 'ru' => '/chto-takoe-ssl-sertifikat'],
            'what-is-ssl-certificate'  => ['az' => '/ssl-sertifikati-nedir', 'en' => '/what-is-ssl-certificate', 'ru' => '/chto-takoe-ssl-sertifikat'],
            'chto-takoe-ssl-sertifikat' => ['az' => '/ssl-sertifikati-nedir', 'en' => '/what-is-ssl-certificate', 'ru' => '/chto-takoe-ssl-sertifikat'],
            // Content marketing
            'kontent-marketinq' => ['az' => '/kontent-marketinq', 'en' => '/content-marketing', 'ru' => '/kontent-marketing'],
            'content-marketing' => ['az' => '/kontent-marketinq', 'en' => '/content-marketing', 'ru' => '/kontent-marketing'],
            'kontent-marketing' => ['az' => '/kontent-marketinq', 'en' => '/content-marketing', 'ru' => '/kontent-marketing'],
        ];

        // Detect current page slug from referrer
        $refPath = trim(parse_url(url()->previous(), PHP_URL_PATH), '/');
        // For portfolio/isler with optional slug segment, use only first segment
        $firstSegment = explode('/', $refPath)[0];

        if (isset($slugMap[$firstSegment]) && isset($slugMap[$firstSegment][$lang])) {
            return redirect($slugMap[$firstSegment][$lang]);
        }

        return redirect()->back();
    }
}
