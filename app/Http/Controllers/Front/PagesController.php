<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\brifModalOneRequest;
use App\Http\Requests\brifModalTwoRequest;
use App\Mail\ContactEmail;
use App\Models\BrifFive;
use App\Models\BrifFour;
use App\Models\BrifLogo;
use App\Models\BrifThree;
use App\Models\BrifVeb;
use App\Models\FirmLogoTip;
use App\Models\KonvertLogoTip;
use App\Models\Product;
use App\Models\Service;
use App\Models\VebFirmaStili;
use App\Models\VebGosterici;
use App\Models\VizitLogoTip;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;

class PagesController extends Controller
{
    use FileUploader;
    public function vebSaytlarinHazirlanmasi()
    {
        return view('front.veb-saytlarin-hazirlanmasi');
    }
    public function seoblank()
    {
        return view('front.seoblank');
    }

    public function seoXidmeti()
    {
        return view('front.seo-xidmeti');
    }

    public function domenNedir()
    {
        return view('front.domen-nedir');
    }

    public function sslSertifikatiNedir()
    {
        return view('front.ssl-sertifikati-nedir');
    }

    public function smmXidmeti()
    {
        return view('front.smm-xidmeti');
    }

    public function googleReklamlari()
    {
        return view('front.google-reklamlari');
    }

    public function loqoHazirlanmasi()
    {
        return view('front.loqo-hazirlanmasi');
    }

    public function facebookVeInstagramReklamlari()
    {
        return view('front.facebook-ve-instagram-reklamlari');
    }

    public function backlinkNedir()
    {
        return view('front.backlink-nedir');
    }

    public function kontentMarketinq()
    {
        return view('front.kontent-marketinq');
    }

    public function texnikiDestek()
    {
        return view('front.texniki-destek');
    }

    public function korporativEmail()
    {
        return view('front.korporativ-email');
    }

    public function services($slug = null)
    {
        return view('front.pages.services', [
            'meta' => $this->metador('portfolio_page'),
            'my_services' => Service::with('products')->where('on_home', 1)->orderBy('order_no', 'asc')->get(),
            'products' => Product::with('service')->get(),
        ]);
    }

    public function servisLoader(Request $request)
    {
        if ($request->servis_id == '*')
        {
            $products   = Product::with('service')->offset($request->start)->limit($request->limit)->get();
            $checkNext  = Product::with('service')->offset($request->start + $request->limit)->limit($request->limit)->get();
        }
        else
        {
            $products   = Product::with('service')->where('service_id', $request->servis_id)->offset($request->start)->limit($request->limit)->orderBy('order_no', 'asc')->get();
            $checkNext  = Product::with('service')->where('service_id', $request->servis_id)->offset($request->start + $request->limit)->limit($request->limit)->get();
        }



        $output = '';
        foreach ($products as $product) {
            if ($product->service->id == 49) {
                $output .= '
                <li class=" col-6 col-md-6 col-xl-3  __js_' . $product->{'slug_' . app()->getLocale()} . '" >
                    <a class="card card--small card--masonry" data-fancybox="gallery" href="' . $product->link . '">
                        <div class="card__image">
                            <img class="lozad" data-src="' . asset('files/products/covers/' . $product->src) . '" src="' . asset('files/products/covers/' . $product->src) . '"  width="428" height="428" alt="' . $product->alt . '">
                        </div>
                        <div class="card__content">


                            <span class="youtube-icon"><i class="fa-solid fa-play"></i></span>

                        </div>
                         <div class="content">
                            <h1>' . $product->{'title_' . app()->getLocale()} . '</h1>
                        </div>
                    </a>

                </li>
            ';
            } else {
                $output .= '
                <li class=" col-12 col-md-6 col-xl-3  __js_' . $product->{'slug_' . app()->getLocale()} . '" >
                    <a class="card card--small card--masonry" href="' . route('front.prodoct.details', ['slug' => $product->service->{'slug_' . app()->getLocale()}, 'id' => $product->{'slug_' . app()->getLocale()}, 'productID' => $product->id]) . '">
                        <div class="card__image">
                            <img class="lozad" data-src="' . asset('files/products/covers/' . $product->src) . '" src="' . asset('files/products/covers/' . $product->src) . '"  width="428" height="428" alt="' . $product->alt . '">
                        </div>
                        <div class="card__content">


                            <h3 class="card__heading f-600">' . $product->{'title_' . app()->getLocale()} . '</h3>

                        </div>
                    </a>
                </li>
                ';
            }
        }

        return response()->json([
            'output'=>$output,
            'next'=>$checkNext->count() > 0 ? true : false
        ], 200);
    }

    public function prodoctDetails($slug, $id, $productID)
    {
        $service = Service::where('slug_az', $slug)
            ->orWhere('slug_en', $slug)
            ->orWhere('slug_ru', $slug)
            ->firstOrFail();
        $product = Product::with('images', 'service')
            ->where('service_id', $service->id)
            ->where(
                fn($query) => $query
                    ->orWhere('slug_az', $id)
                    ->orWhere('slug_en', $id)
                    ->orWhere('slug_ru', $id)
            )
            ->whereId($productID)
            ->firstOrFail();

        $product->increment('hits');
        return view('front.pages.product-details', compact('product'));
    }

    public function brifModalOne(brifModalOneRequest $request)
    {
        $src = $this->fileSave('files/logos/', $request, 'movcudlogo');
        $brif = BrifLogo::create([
            'sirketadi' => $request->sirketadi,
            'logotip' => $request->logotip,
            'fealiyyetsahesi' => $request->fealiyyetsahesi,
            'prespektiv' => $request->prespektiv,
            'reqibler' => $request->reqibler,
            'fealiyyetdairesi' => $request->fealiyyetdairesi,
            'movcudlogo' => $src,
            'reng' => $request->reng,
            'logotipvacibliyi' => $request->logotipvacibliyi,
            'logotipsecimi' => $request->logotipsecimi,
            'diger' => $request->diger,
            'basqaarzu' => $request->basqaarzu,
            'ad' => $request->ad,
            'vezife' => $request->vezife,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'vaxt' => $request->vaxt,
        ]);

        if ($request->firma_stili) {
            foreach ($request->firma_stili as $stil) {
                FirmLogoTip::create([
                    'brif_id' => $brif->id,
                    'firma_id' => $stil,
                ]);
            }
        }

        if ($request->konvert) {
            foreach ($request->konvert as $konvert) {
                KonvertLogoTip::create([
                    'brif_id' => $brif->id,
                    'konvert_id' => $konvert,
                ]);
            }
        }

        if ($request->karparativkart) {
            foreach ($request->karparativkart as $kart) {
                VizitLogoTip::create([
                    'brif_id' => $brif->id,
                    'vizit_id' => $kart,
                ]);
            }
        }
//dd($brif->logotips->name_az);
        $firmaStili = '';
        $karts = '';
        $myLogos = '';
        if ($brif->firma_styles) {
            foreach ($brif->firma_styles as $stil) {
                $firmaStili .= $stil->firmaStyle->name_az . ',';
            }
        }

        if ($brif->karparativkarts) {
            foreach ($brif->karparativkarts as $kart) {
                $karts .= $kart->kart->name_az . ',';
            }
        }

        if ($brif->konvertLogos) {
            foreach ($brif->konvertLogos as $konvertLogo) {
                $myLogos .= $konvertLogo->logo->name_az . ',';
            }
        }


        $title = $brif->ad . ' tərəfindən yeni elektron müraciət daxil oldu.(Logo sifarişi)';
        $text = '
            <table>
                <tr>
                    <td>Ad,Soyad:</td>
                    <td>' . $brif->ad . '</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>' . $brif->email . '</td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td>' . $brif->telefon . '</td>
                </tr>
                <tr>
                    <td>Vəzifə:</td>
                    <td>' . $brif->vezife . '</td>
                </tr>
                <tr>
                    <td>Vaxt:</td>
                    <td>' . $brif->vaxt . '</td>
                </tr>


                <tr>
                    <td>Şirkətin adı:</td>
                    <td>' . $brif->sirketadi . '</td>
                </tr>
                <tr>
                    <td>Logotip:</td>
                    <td>' . $brif->logotip . '</td>
                </tr>
                <tr>
                    <td>Fəaliyyət sahəsi:</td>
                    <td>' . $brif->fealiyyetsahesi . '</td>
                </tr>
                <tr>
                    <td>Prespektiv:</td>
                    <td>' . $brif->prespektiv . '</td>
                </tr>
                <tr>
                    <td>Rəqiblər:</td>
                    <td>' . $brif->reqibler . '</td>
                </tr>
                <tr>
                    <td>Fəaliyyət dairəsi:</td>
                    <td>' . $brif->fealiyyetdairesi . '</td>
                </tr>
                <tr>
                    <td>Mövcud logo:</td>
                    <td><img src="' . asset('files/logos/' . $brif->movcudlogo) . '" style="width: 150px" alt=""></td>
                </tr>
                <tr>
                    <td>Rəng:</td>
                    <td>' . $brif->reng . '</td>
                </tr>
                <tr>
                    <td>Loqotipin vacibliyi:</td>
                    <td>' . $brif->logotipvacibliyi . '</td>
                </tr>
                <tr>
                    <td>Loqotip seçimi:</td>
                    <td>' . ($brif->logotips ? $brif->logotips->name_az : '') . '</td>
                </tr>
                <tr>
                    <td>Digər:</td>
                    <td>' . $brif->diger . '</td>
                </tr>
                <tr>
                    <td>Başqa arzu:</td>
                    <td>' . $brif->basqaarzu . '</td>
                </tr>
                <tr>
                    <td>Firma stili:</td>
                    <td>' . $firmaStili . '</td>
                </tr>
                <tr>
                    <td>Vizit kart:</td>
                    <td>' . $karts . '</td>
                </tr>
                <tr>
                    <td>Konvert:</td>
                    <td>' . $myLogos . '</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body' => $text
        ];
//        Mail::to('adpuuniversitet@gmail.com')->send(new ContactEmail($details));

        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "in-v3.mailjet.com";
        $mail->Port = 587;
        $mail->Username = config('system.MAIL_USERNAME');
        $mail->Password = config('system.MAIL_PASSWORD');
        $mail->setFrom(config('system.MAIL_FROM_ADDRESS'), "noreply");
        $mail->Subject = $title;
        $mail->IsHTML(true);
        $mail->Body = view('emails.contact-mail', compact('details'))->render();
        $mail->addAddress(config('system.MAIL_TO_ADDRESS'), 'RS CODE');
        $mail->send();

        return \response()->json([
            'message' => __('static.contact_success'),
        ], 200);
    }

    public function brifModalTwo(brifModalTwoRequest $request)
    {
//        dd($request->post());
        $brifVeb = BrifVeb::create([
            'web_sirketadi' => $request->web_sirketadi,
            'web_logotip' => $request->web_logotip,
            'web_fealiyyetsahesi' => $request->web_fealiyyetsahesi,
            'web_prespektiv' => $request->web_prespektiv,
            'web_reqibler' => $request->web_reqibler,
            'web_firmastilidiger' => $request->web_firmastilidiger,
            'web_gosterisvesaitidiger' => $request->web_gosterisvesaitidiger,
            'web_az' => $request->has('web_az') ? 1 : null,
            'web_en' => $request->has('web_en') ? 1 : null,
            'web_ru' => $request->has('web_ru') ? 1 : null,
            'web_qeydler' => $request->web_qeydler,
            'web_menu' => $request->web_menu,
            'web_imkanlar1' => $request->has('web_imkanlar1') ? 1 : null,
            'web_imkanlar2' => $request->has('web_imkanlar2') ? 1 : null,
            'web_imkanlar3' => $request->has('web_imkanlar3') ? 1 : null,
            'web_imkanlar4' => $request->has('web_imkanlar4') ? 1 : null,
            'web_imkanlar5' => $request->has('web_imkanlar5') ? 1 : null,
            'web_ad' => $request->web_ad,
            'web_vezife' => $request->web_vezife,
            'web_telefon' => $request->web_telefon,
            'web_email' => $request->web_email,
            'web_vaxt' => $request->web_vaxt,
        ]);

        if ($request->has('web_firmastili')) {
            foreach ($request->web_firmastili as $item) {
                VebFirmaStili::create([
                    'brif_veb_id' => $brifVeb->id,
                    'veb_dasiyici_id' => $item,
                ]);
            }
        }

        if ($request->has('web_gosteris')) {
            foreach ($request->web_gosteris as $item) {
                VebGosterici::create([
                    'brif_veb_id' => $brifVeb->id,
                    'veb_vesait_id' => $item,
                ]);
            }
        }

        $veb_firma_stili = '';
        $veb_gosterici = '';
        if ($brifVeb->firma_stilis) {
            foreach ($brifVeb->firma_stilis as $firma_stil) {
                $veb_firma_stili .= $firma_stil->veb_dasiyicis->name_az . ',';
            }
        }

        if ($brifVeb->web_gosteris) {
            foreach ($brifVeb->web_gosteris as $web_goster) {
                $veb_gosterici .= $web_goster->vesait->name_az . ',';
            }
        }

        $title = $brifVeb->web_ad . ' tərəfindən yeni elektron müraciət daxil oldu.(Veb sifarişi)';
        $text = '
            <table>
                <tr>
                    <td>Ad,Soyad:</td>
                    <td>' . $brifVeb->web_ad . '</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>' . $brifVeb->web_email . '</td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td>' . $brifVeb->web_telefon . '</td>
                </tr>
                <tr>
                    <td>Vəzifə:</td>
                    <td>' . $brifVeb->web_vezife . '</td>
                </tr>
                <tr>
                    <td>Vaxt:</td>
                    <td>' . $brifVeb->web_vaxt . '</td>
                </tr>


                <tr>
                    <td>Şirkətin adı:</td>
                    <td>' . $brifVeb->web_sirketadi . '</td>
                </tr>
                <tr>
                    <td>Logotip:</td>
                    <td>' . $brifVeb->web_logotip . '</td>
                </tr>
                <tr>
                    <td>Fəaliyyət sahəsi:</td>
                    <td>' . $brifVeb->web_fealiyyetsahesi . '</td>
                </tr>
                <tr>
                    <td>Prespektiv:</td>
                    <td>' . $brifVeb->web_prespektiv . '</td>
                </tr>
                <tr>
                    <td>Rəqiblər:</td>
                    <td>' . $brifVeb->web_reqibler . '</td>
                </tr>
                <tr>
                    <td>Firma Stili Digər:</td>
                    <td>' . $brifVeb->web_firmastilidiger . '</td>
                </tr>
                <tr>
                    <td>Göstəriş Vəsaiti Digər:</td>
                    <td>' . $brifVeb->web_gosterisvesaitidiger . '</td>
                </tr>
                <tr>
                    <td>Dil Seçimi:</td>
                    <td>' . ($brifVeb->web_az ? 'Az,' : '') . ($brifVeb->web_en ? 'En,' : '') . ($brifVeb->web_ru ? 'Ru' : '') . '</td>
                </tr>
                <tr>
                    <td>Qeydlər:</td>
                    <td>' . $brifVeb->web_qeydler . '</td>
                </tr>
                <tr>
                    <td>Saytın menusu:</td>
                    <td>' . $brifVeb->web_menu . '</td>
                </tr>
                <tr>
                    <td>Funksianal imkanları:</td>
                    <td>' .
            ($brifVeb->web_imkanlar1 ? 'SAYTIN İNTERNETDE YERLƏŞDİRİLMƏSİ (SAYTIN HOSTİNG VƏ DOMEN ADLARININ QEYDİYYATI) <br/>' : '') .
            ($brifVeb->web_imkanlar2 ? 'SAYTA MƏLUMATLARIN DOLDURULMASI <br/>' : '') .
            ($brifVeb->web_imkanlar3 ? 'SEO (SEARCH ENGİNE OPTİMİZATE) AXTARIŞ. SİSTEMİNDƏ SAYTIN ÖNÇIXIŞI <br/>' : '') .
            ($brifVeb->web_imkanlar4 ? 'FİRMA ÜSLUBUNUN HAZIRLANMASI (LOQOTİP, FORMA BLANKLARI, KART VİZİT VƏ S.) <br/>' : '') .
            ($brifVeb->web_imkanlar5 ? 'ƏLAVƏ İLLÜSTRASİYA, ƏLAVƏ ŞƏKİLLƏR,KOLLAJ' : '')
            . '</td>
                </tr>
                <tr>
                    <td>Saytın menusu:</td>
                    <td>' . $brifVeb->web_menu . '</td>
                </tr>
                <tr>
                    <td>Firma stili üçün daşıyıcılar:</td>
                    <td>' . $veb_firma_stili . '</td>
                </tr>
                <tr>
                    <td>Firma stili üçün göstəriş vəsaiti:</td>
                    <td>' . $veb_gosterici . '</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body' => $text
        ];
//        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactEmail($details));

        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "in-v3.mailjet.com";
        $mail->Port = 587;
        $mail->Username = config('system.MAIL_USERNAME');
        $mail->Password = config('system.MAIL_PASSWORD');
        $mail->setFrom(config('system.MAIL_FROM_ADDRESS'), "noreply");
        $mail->Subject = $title;
        $mail->IsHTML(true);
        $mail->Body = view('emails.contact-mail', compact('details'))->render();
        $mail->addAddress(config('system.MAIL_TO_ADDRESS'), 'RS CODE');
        $mail->send();

        return \response()->json([
            'message' => __('static.contact_success'),
        ], 200);
    }

    public function brifModalThree(Request $request)
    {
        $this->validate($request, [
            'adlandirma_sirketadi' => 'required|max:255',
            'adlandirma_seqment' => 'required|max:255',
            'adlandirma_hedef' => 'required|max:255',
            'adlandirma_ugurluadlar' => 'required|max:255',
            'adlandirma_teessurat' => 'required|max:255',
            'adlandirma_xaricidil' => 'required|max:255',
            'adlandirma_sozlerinsayi' => 'required|max:255',
            'adlandirma_elaveistek' => 'required|max:255',
            'adlandirma_ad' => 'required|max:255',
            'adlandirma_vezife' => 'required|max:255',
            'adlandirma_telefon' => 'required|max:255',
            'adlandirma_email' => 'required|email|max:255',
            'adlandirma_vaxt' => 'required|max:255',
        ],[],
            [
                'adlandirma_sirketadi'=>__('static.modal_3_label_2'),
                'adlandirma_seqment'=>__('static.modal_3_label_3'),
                'adlandirma_hedef'=>__('static.modal_3_label_4'),
                'adlandirma_ugurluadlar'=>__('static.modal_3_label_5'),
                'adlandirma_teessurat'=>__('static.modal_3_label_6'),
                'adlandirma_xaricidil'=>__('static.modal_3_label_7'),
                'adlandirma_sozlerinsayi'=>__('static.modal_3_label_8'),
                'adlandirma_elaveistek'=>__('static.modal_3_label_9'),
                'adlandirma_ad'=>__('static.modal_1_label_20'),
                'adlandirma_vezife'=>__('static.modal_1_label_21'),
                'adlandirma_telefon'=>__('static.modal_1_label_22'),
                'adlandirma_email'=>__('static.modal_1_label_23'),
                'adlandirma_vaxt'=>__('static.modal_1_label_24')
            ]);

        $brifThree = BrifThree::create([
            'adlandirma_sirketadi' => $request->adlandirma_sirketadi,
            'adlandirma_seqment'=>$request->adlandirma_seqment,
            'adlandirma_hedef'=>$request->adlandirma_hedef,
            'adlandirma_ugurluadlar'=>$request->adlandirma_ugurluadlar,
            'adlandirma_teessurat'=>$request->adlandirma_teessurat,
            'adlandirma_xaricidil'=>$request->adlandirma_xaricidil,
            'adlandirma_sozlerinsayi'=>$request->adlandirma_sozlerinsayi,
            'adlandirma_elaveistek'=>$request->adlandirma_elaveistek,
            'adlandirma_ad'=>$request->adlandirma_ad,
            'adlandirma_vezife'=>$request->adlandirma_vezife,
            'adlandirma_telefon'=>$request->adlandirma_telefon,
            'adlandirma_email'=>$request->adlandirma_email,
            'adlandirma_vaxt'=>$request->adlandirma_vaxt
        ]);

        $title = 'ADLANDIRMA ÜÇÜN BRİF formundan yeni elektron müraciət daxil oldu.';
        $text = '
            <table>
                <tr>
                    <td>ŞİRKƏT, MƏHSUL VƏ YA XİDMƏT HAQQINDA MƏLUMAT:</td>
                    <td>' . $brifThree->adlandirma_sirketadi . '</td>
                </tr>
                <tr>
                    <td>SEQMENT ÜZRƏ RƏQİBLƏR:</td>
                    <td>' . $brifThree->adlandirma_seqment . '</td>
                </tr>
                <tr>
                    <td>HƏDƏF KÜTLƏ(KORPORATİV MÜŞTƏRİLƏR, FİZİKİ ŞƏXSLƏR):</td>
                    <td>' . $brifThree->adlandirma_hedef . '</td>
                </tr>
                <tr>
                    <td>UĞURLU HESAB EDİLƏN ADLAR:</td>
                    <td>' . $brifThree->adlandirma_ugurluadlar . '</td>
                </tr>
                <tr>
                    <td>AD MÜŞTƏRİDƏ HANSI TƏƏSSÜRAT OYATMALIDIR? (MƏSƏLƏN LÜKS, SPORT VƏ S.):</td>
                    <td>' . $brifThree->adlandirma_teessurat . '</td>
                </tr>
                <tr>
                    <td>XARİCİ DİLDƏ OLAN SÖZLƏRİN İSTİFADƏSİNƏ İCAZƏ VARMI? YOXSA YALNIZ AZƏRBAYCAN DİLİNDƏ OLMALIDIR?:</td>
                    <td>' . $brifThree->adlandirma_xaricidil . '</td>
                </tr>
                <tr>
                    <td>ADDA SÖZLƏRİN SAYI BİR ƏDƏD OLMALIDIR YOXSA BİR NEÇƏ SÖZ OLA BİLƏR?:</td>
                    <td>' . $brifThree->adlandirma_sozlerinsayi . '</td>
                </tr>
                <tr>
                    <td>ƏLAVƏ İSTƏKLƏRİNİZ:</td>
                    <td>' . $brifThree->adlandirma_elaveistek . '</td>
                </tr>
                <tr>
                    <td>ƏLAQƏDAR ŞƏXS:</td>
                    <td>' . $brifThree->adlandirma_ad . '</td>
                </tr>
                <tr>
                    <td>VƏZİFƏSİ:</td>
                    <td>' . $brifThree->adlandirma_vezife . '</td>
                </tr>
                <tr>
                    <td>TEL NÖMRƏSİ:</td>
                    <td>' . $brifThree->adlandirma_telefon . '</td>
                </tr>
                <tr>
                    <td>E-MAİL:</td>
                    <td>' . $brifThree->adlandirma_email . '</td>
                </tr>
                <tr>
                    <td>BRİFİN DOLDURULMA TARİXİ:</td>
                    <td>' . $brifThree->adlandirma_vaxt . '</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body' => $text
        ];
//        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactEmail($details));

        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "in-v3.mailjet.com";
        $mail->Port = 587;
        $mail->Username = config('system.MAIL_USERNAME');
        $mail->Password = config('system.MAIL_PASSWORD');
        $mail->setFrom(config('system.MAIL_FROM_ADDRESS'), "noreply");
        $mail->Subject = $title;
        $mail->IsHTML(true);
        $mail->Body = view('emails.contact-mail', compact('details'))->render();
        $mail->addAddress(config('system.MAIL_TO_ADDRESS'), 'RS CODE');
        $mail->send();

        return \response()->json([
            'message' => __('static.contact_success'),
        ], 200);
    }

    public function brifModalFour(Request $request)
    {
        $this->validate($request,[
            'smm_sirketadi'=>'required|max:255',
            'smm_sirketsahesi'=>'required|max:255',
            'smm_sirkethaqqinda'=>'required|max:255',
            'web_gosteris.*'=>'required|in:facebook,instagram,linkedin,youtube,tiktok',
            'smm_ayligpost'=>'required|max:255',
            'smm_gozlenti'=>'required|max:255',
            'smm_ayligbudce'=>'required|max:255',
            'smm_reqibler'=>'required|max:255',
            'smm_cavablandirma'=>'required|max:255',
            'smm_ad'=>'required|max:255',
            'smm_vezife'=>'required|max:255',
            'smm_telefon'=>'required|max:255',
            'smm_email'=>'required|email|max:255',
            'smm_vaxt'=>'required|max:255',
        ],[],
            [
                'smm_sirketadi'=>__('static.modal_1_label_2'),
                'smm_sirketsahesi'=>__('static.modal_4_label_2'),
                'smm_sirkethaqqinda'=>__('static.modal_4_label_3'),
                'web_gosteris'=>__('static.modal_4_label_4'),
                'smm_ayligpost'=>__('static.modal_4_label_10'),
                'smm_gozlenti'=>__('static.modal_4_label_11'),
                'smm_ayligbudce'=>__('static.modal_4_label_12'),
                'smm_reqibler'=>__('static.modal_4_label_13'),
                'smm_cavablandirma'=>__('static.modal_4_label_14'),
                'smm_ad'=>__('static.modal_1_label_19'),
                'smm_vezife'=>__('static.modal_1_label_21'),
                'smm_telefon'=>__('static.modal_1_label_22'),
                'smm_email'=>__('static.modal_1_label_23'),
                'smm_vaxt'=> __('static.modal_1_label_24'),
            ]);


        $brifFour = BrifFour::create([
            'smm_sirketadi'=>$request->smm_sirketadi,
            'smm_sirketsahesi'=>$request->smm_sirketsahesi,
            'smm_sirkethaqqinda'=>$request->smm_sirkethaqqinda,
            'web_gosteris'=>implode(",",$request->web_gosteris),
            'smm_ayligpost'=>$request->smm_ayligpost,
            'smm_gozlenti'=>$request->smm_gozlenti,
            'smm_ayligbudce'=>$request->smm_ayligbudce,
            'smm_reqibler'=>$request->smm_reqibler,
            'smm_cavablandirma'=>$request->smm_cavablandirma,
            'smm_ad'=>$request->smm_ad,
            'smm_vezife'=>$request->smm_vezife,
            'smm_telefon'=>$request->smm_telefon,
            'smm_email'=>$request->smm_email,
            'smm_vaxt'=>$request->smm_vaxt
        ]);

        $title = 'SMM ÜÇÜN BRİF formundan yeni elektron müraciət daxil oldu.';
        $text = '
            <table>
                <tr>
                    <td>ŞİRKƏTİN ADI (ŞİRKƏTİN TAM VƏ QISA ADI,RUS, LATIN VƏ DİGƏR DİLLƏRDƏ YAZILIŞ QAYDASI):</td>
                    <td>' . $brifFour->smm_sirketadi . '</td>
                </tr>
                <tr>
                    <td>ŞİRKƏTİN SAHƏSİ/SEKTORU:</td>
                    <td>' . $brifFour->smm_sirketsahesi . '</td>
                </tr>
                <tr>
                    <td>ŞİRKƏT HAQQINDA MƏLUMAT:</td>
                    <td>' . $brifFour->smm_sirkethaqqinda . '</td>
                </tr>
                <tr>
                    <td>PLANLAŞDIRILAN SOSİAL MEDİA HESABLARI:</td>
                    <td>' . $brifFour->web_gosteris . '</td>
                </tr>
                <tr>
                    <td>NƏZƏRDƏ TUTULAN AYLIQ POST PLANI:</td>
                    <td>' . $brifFour->smm_ayligpost . '</td>
                </tr>
                <tr>
                    <td>SƏHİFƏDƏN GÖZLƏNTİNİZ: İMİC, SATIŞ, SƏHİFƏ, ARTIM:</td>
                    <td>' . $brifFour->smm_gozlenti . '</td>
                </tr>
                <tr>
                    <td>NƏZƏRDƏ TUTULAN AYLIQ REKLAM BÜDCƏSİ:</td>
                    <td>' . $brifFour->smm_ayligbudce . '</td>
                </tr>
                <tr>
                    <td>RƏQİBLƏRİNİZ:</td>
                    <td>' . $brifFour->smm_reqibler . '</td>
                </tr>
                <tr>
                    <td>CAVABLANDIRMA KİM TƏRƏFİNDƏN OLUNACAQ? AGENTLİK, ŞİRKƏT:</td>
                    <td>' . $brifFour->smm_cavablandirma . '</td>
                </tr>
                <tr>
                    <td>SOYADI, ADI:</td>
                    <td>' . $brifFour->smm_ad . '</td>
                </tr>
                <tr>
                    <td>VƏZİFƏSİ:</td>
                    <td>' . $brifFour->smm_vezife . '</td>
                </tr>
                <tr>
                    <td>TEL NÖMRƏSİ:</td>
                    <td>' . $brifFour->smm_telefon . '</td>
                </tr>
                <tr>
                    <td>E-MAİL:</td>
                    <td>' . $brifFour->smm_email . '</td>
                </tr>
                <tr>
                    <td>BRİFİN DOLDURULMA TARİXİ:</td>
                    <td>' . $brifFour->smm_vaxt . '</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body' => $text
        ];
//        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactEmail($details));

        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "in-v3.mailjet.com";
        $mail->Port = 587;
        $mail->Username = config('system.MAIL_USERNAME');
        $mail->Password = config('system.MAIL_PASSWORD');
        $mail->setFrom(config('system.MAIL_FROM_ADDRESS'), "noreply");
        $mail->Subject = $title;
        $mail->IsHTML(true);
        $mail->Body = view('emails.contact-mail', compact('details'))->render();
        $mail->addAddress(config('system.MAIL_TO_ADDRESS'), 'RS CODE');
        $mail->send();

        return \response()->json([
            'message' => __('static.contact_success'),
        ], 200);
    }

    public function brifModalFive(Request $request)
    {
        $this->validate($request, [
            'seo_sirketadi'=>'required|max:255',
            'seo_sirketsahesi'=>'required|max:255',
            'seo_sirkethaqqinda'=>'required|max:255',
            'seo_vebsayt'=>'required|max:255',
            'seo_acarsozler'=>'required|max:255',
            'seo_budce'=>'required|max:255',
            'seo_ad'=>'required|max:255',
            'seo_vezife'=>'required|max:255',
            'seo_telefon'=>'required|max:255',
            'seo_email'=>'required|email|max:255',
            'seo_vaxt'=>'required|max:255',
        ],[],
            [
                'seo_sirketadi'=>__('static.modal_1_label_2'),
                'seo_sirketsahesi'=>__('static.modal_4_label_2'),
                'seo_sirkethaqqinda'=>__('static.modal_4_label_3'),
                'seo_vebsayt'=>__('static.modal_5_label_2'),
                'seo_acarsozler'=>__('static.modal_5_label_3'),
                'seo_budce'=>__('static.modal_5_label_4'),
                'seo_ad'=>__('static.modal_1_label_20'),
                'seo_vezife'=>__('static.modal_1_label_21'),
                'seo_telefon'=>__('static.modal_1_label_22'),
                'seo_email'=>__('static.modal_1_label_23'),
                'seo_vaxt'=>__('static.modal_1_label_24'),
            ]);

        $brifFive = BrifFive::create([
            'seo_sirketadi'=>$request->seo_sirketadi,
            'seo_sirketsahesi'=>$request->seo_sirketsahesi,
            'seo_sirkethaqqinda'=>$request->seo_sirkethaqqinda,
            'seo_vebsayt'=>$request->seo_vebsayt,
            'seo_acarsozler'=>$request->seo_acarsozler,
            'seo_budce'=>$request->seo_budce,
            'seo_ad'=>$request->seo_ad,
            'seo_vezife'=>$request->seo_vezife,
            'seo_telefon'=>$request->seo_telefon,
            'seo_email'=>$request->seo_email,
            'seo_vaxt' =>$request->seo_vaxt,
        ]);

        $title = 'SEO ÜÇÜN BRİF formundan yeni elektron müraciət daxil oldu.';
        $text = '
            <table>
                <tr>
                    <td>ŞİRKƏTİN ADI (ŞİRKƏTİN TAM VƏ QISA ADI,RUS, LATIN VƏ DİGƏR DİLLƏRDƏ YAZILIŞ QAYDASI):</td>
                    <td>' . $brifFive->seo_sirketadi . '</td>
                </tr>
                <tr>
                    <td>ŞİRKƏTİN SAHƏSİ/SEKTORU:</td>
                    <td>' . $brifFive->seo_sirketsahesi . '</td>
                </tr>
                <tr>
                    <td>ŞİRKƏT HAQQINDA MƏLUMAT:</td>
                    <td>' . $brifFive->seo_sirkethaqqinda . '</td>
                </tr>
                <tr>
                    <td>VEB SAYTINIZ:</td>
                    <td>' . $brifFive->seo_vebsayt . '</td>
                </tr>
                <tr>
                    <td>ÖNƏ ÇIXARILMASI İSTƏNƏN AÇAR SÖZLƏR:</td>
                    <td>' . $brifFive->seo_acarsozler . '</td>
                </tr>
                <tr>
                    <td>NƏZƏRDƏ TUTULAN BÜDCƏ:</td>
                    <td>' . $brifFive->seo_budce . '</td>
                </tr>
                <tr>
                    <td>SOYADI, ADI:</td>
                    <td>' . $brifFive->seo_ad . '</td>
                </tr>
                <tr>
                    <td>VƏZİFƏSİ:</td>
                    <td>' . $brifFive->seo_vezife . '</td>
                </tr>
                <tr>
                    <td>TEL NÖMRƏSİ:</td>
                    <td>' . $brifFive->seo_telefon . '</td>
                </tr>
                <tr>
                    <td>E-MAİL:</td>
                    <td>' . $brifFive->seo_email . '</td>
                </tr>
                <tr>
                    <td>BRİFİN DOLDURULMA TARİXİ:</td>
                    <td>' . $brifFive->seo_vaxt . '</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body' => $text
        ];
//        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactEmail($details));

        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "in-v3.mailjet.com";
        $mail->Port = 587;
        $mail->Username = config('system.MAIL_USERNAME');
        $mail->Password = config('system.MAIL_PASSWORD');
        $mail->setFrom(config('system.MAIL_FROM_ADDRESS'), "noreply");
        $mail->Subject = $title;
        $mail->IsHTML(true);
        $mail->Body = view('emails.contact-mail', compact('details'))->render();
        $mail->addAddress(config('system.MAIL_TO_ADDRESS'), 'RS CODE');
        $mail->send();

        return \response()->json([
            'message' => __('static.contact_success'),
        ], 200);
    }
}
