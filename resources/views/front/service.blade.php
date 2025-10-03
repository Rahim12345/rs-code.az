@extends('front.layouts.master')

@section('content')

<header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="cont mt-20 mb-20 text-center">
                    <h1 class="color-font fw-700 fontsize">{{__('index.services')}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="half sub-bg">
        <div class="circle-color">
            <div class="gradient-circle"></div>
            <div class="gradient-circle two"></div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->

<!-- ==================== Start Services ==================== -->
<div class="main-content">
<section class="services bords section-padding2 pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-md-12 f9f">
                <div class="imag">
                    <img src="/img/main_service.png" alt="">
                </div>
            </div>
            <div class="col-xl-8 col-md-12 f8f pt-20">
                <div class="row pt-50">
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".2s">
                        <div class="item-box px-1 md-mb20">
                            <div class="imgBox">
                                <a href="/veb-saytlarin-hazirlanmasi"> <i class="fas fa-window-restore"></i></a>
                            </div>
                            <h6><a href="/veb-saytlarin-hazirlanmasi">{{__('service.website')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".2s">
                        <div class="item-box px-1">
                            <div class="imgBox">
                                <a ><i class="fas fa-pencil-ruler"></i></a>
                            </div>
                            <h6><a href="#">{{__('service.design')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".4s">
                        <div class="item-box px-1 md-mb20">
                            <div class="imgBox">
                                <a href="/smm-xidmeti"><i class="fas fa-poll"></i></a>
                            </div>
                            <h6><a href="/smm-xidmeti">{{__('about.smm')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".4s">
                        <div class="item-box px-1">
                            <div class="imgBox">
                                <a href="/loqo-hazirlanmasi"><i class="fas fa-pen-alt"></i></a>
                            </div>
                            <h6><a href="/loqo-hazirlanmasi">{{__('service.photo')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".6s">
                        <div class="item-box px-1 md-mb20">
                            <div class="imgBox">
                                <a href="/korporativ-email"><i class="fas fa-envelope-open-text"></i></a>
                            </div>
                            <h6><a href="/korporativ-email">{{__('service.comail')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".6s">
                        <div class="item-box px-1">
                            <div class="imgBox">
                                <a href="/seo-xidmeti"><i class="fas fa-chart-line"></i></a>
                            </div>
                            <h6><a href="/seo-xidmeti">{{__('about.seo')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".6s">
                        <div class="item-box px-1 md-mb20">
                            <div class="imgBox">
                                <a href="/google-reklamlari"><i class="fab fa-google"></i></a>
                            </div>
                            <h6><a href="/google-reklamlari">{{__('service.googleads')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".6s">
                        <div class="item-box px-1">
                            <div class="imgBox">
                                <a href="/texniki-destek"><i class="fas fa-user-cog"></i></a>

                            </div>
                            <h6><a href="/texniki-destek">{{__('service.support')}}</a></h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay=".6s">
                        <div class="item-box px-1">
                            <div class="imgBox">
                                <i class="fas fa-server"></i>
                            </div>
                            <h6><a href="#">{{__('service.hosting')}}</a></h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== End Services ==================== -->
 {{-- <section class="section-padding2 princ pt-0 position-re">

    <div class="princgtable pb-100">
        <div class="container">
            <h4 class=" text-center color-font fontsize2 pb-70 pt-5">
                Korporativ sayt hazırlanması qiymətləri
            </h4>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricingTable10 paket1">
                        <div class="pricingTable-header">
                            <h3 class="heading">"S" Paketi</h3>
                            <span class="price-value">
                                <span class="currency"></span>499
                                <span class="month">&#8380;</span>
                            </span>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>Premium şablon üzərində dizayn</li>
                                <li>Landing (1 səhifəli sayt)</li>
                                <li>Dil seçimi: 1 - 2 dildə</li>
                                <li>Hostinq: 12 ay</li>
                                <li>SSL sertifikat</li>
                                <li>Domen hədiyyə</li>
                            </ul>
                            <a href="#" class="read">Sifariş et</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 sm-pt30">
                    <div class="pricingTable10 pak paket2 active">
                        <div class="pricingTable-header">
                            <h3 class="heading">"M" Paketi</h3>
                            <span class="price-value">
                                <span class="currency"></span>800-1400
                                <span class="month">&#8380;</span>
                            </span>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>PHP, Laravel</li>
                                <li>Dil seçimi: 1 - 3 dildə</li>
                                <li>Hostinq: 12 ay</li>
                                <li>İdarəetmə paneli</li>
                                <li>Axtarış Sistemlərində Qeydiyyat</li>
                                <li>SSL sertifikat</li>
                                <li>Domen hədiyyə</li>
                            </ul>
                            <a href="#" class="read">Sifariş et</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricingTable10  paket3 ">
                        <div class="pricingTable-header">
                            <h3 class="heading">"L" Paketi</h3>
                            <span class="price-value">
                                <span class="currency"></span>1500-2400
                                <span class="month">&#8380;</span>
                            </span>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>PHP, Laravel</li>
                                <li>Dil seçimi: 2 - 3 dildə</li>
                                <li>Hostinq: 12 ay</li>
                                <li>İdarəetmə paneli</li>
                                <li>Axtarış Sistemlərində Qeydiyyat</li>
                                <li>SEO xidməti</li>
                                <li>Onlayn Çat Sistemi</li>
                                <li>SSL sertifikat</li>
                                <li>Domen hədiyyə</li>
                            </ul>
                            <a href="#" class="read">Sifariş et</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="line top left"></div>


</section>
<section class="section-padding2 princ pt-0 position-re">
    <div class="princgtable pb-100">
        <div class="container">
            <h4 class="text-center color-font fontsize2  pb-70 pt-5">
                Onlayn Mağaza tipli sayt hazırlanması qiymətləri
            </h4>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricingTable10 paket1 ">
                        <div class="pricingTable-header">
                            <h3 class="heading">"Market-1 "Paketi</h3>
                            <span class="price-value">
                                <span class="currency"></span>790
                                <span class="month">&#8380;</span>
                            </span>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>Premium şablon üzərində dizayn</li>
                                <li>PHP, Laravel</li>
                                <li>İdarəetmə paneli</li>
                                <li>Kataloq strukturunun qurulması</li>
                                <li>Məhsul əlavə edilməsi: 100 ədəd</li>
                                <li>Dil seçimi: 2 - 3 dildə</li>
                                <li>Hostinq: 12 ay</li>
                                <li>SSL sertifikat</li>
                                <li>Domen hədiyyə</li>
                            </ul>
                            <a href="#" class="read">Sifariş et</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricingTable10 pak paket2 active sm-pt30">
                        <div class="pricingTable-header">
                            <h3 class="heading">"Market-2" Paketi</h3>
                            <span class="price-value">
                                <span class="currency"></span>1200-1700
                                <span class="month">&#8380;</span>
                            </span>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>PHP, Laravel</li>
                                <li>Hazır dizayn üzərində frontend</li>
                                <li>Onlayn Ödəniş Sistemi</li>
                                <li>Dil seçimi: 1 - 3 dildə</li>
                                <li>Kataloq strukturunun qurulması</li>
                                <li>Məhsul əlavə edilməsi: 200 ədəd</li>
                                <li>Hostinq: 12 ay</li>
                                <li>İdarəetmə paneli</li>
                                <li>Axtarış Sistemlərində Qeydiyyat</li>
                                <li>SSL sertifikat</li>
                                <li>Domen hədiyyə</li>
                            </ul>
                            <a href="#" class="read">Sifariş et</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricingTable10 paket3">
                        <div class="pricingTable-header">
                            <h3 class="heading">"Market-3" Paketi</h3>
                            <span class="price-value">
                                <span class="currency"></span>1800-3000
                                <span class="month">&#8380;</span>
                            </span>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>Unkal Dizayn</li>
                                <li>PHP, Laravel</li>
                                <li>Hissə-hissə ödəniş sistemi</li>
                                <li>Hazır dizayn üzərində frontend</li>
                                <li>Onlayn Ödəniş Sistemi</li>
                                <li>Dil seçimi: 1 - 4 dildə</li>
                                <li>Kataloq strukturunun qurulması</li>
                                <li>Məhsul əlavə edilməsi: 300 ədəd</li>
                                <li>Hostinq: 12 ay</li>
                                <li>İdarəetmə paneli</li>
                                <li>Axtarış Sistemlərində Qeydiyyat</li>
                                <li>SEO xidməti</li>
                                <li>Onlayn Chat sistemi</li>
                                <li>SSL sertifikat</li>
                                <li>Domen hədiyyə</li>
                            </ul>
                            <a href="#" class="read">Sifariş et</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line top right"></div>
</section> --}}
<!--
<section class="section-padding2 position-re calculator">
    <div class="container">
        <div class="info">
            <h3>
                Hörmətli Müştərilər
            </h3>
            <p>
                Bu səhifədə göstərilən bütün qiymətlər orta bazar qiymətləridir. Layihənizin unikal olduğunu və fərdi bir yanaşma tələb etdiyini başa düşürük. Buna görə də studiyamızdan daha dəqiq, fərdi təklif almaq üçün ən yaxşısı <a href="mailto:info@crr.az">info@crr.az</a> elektron poçtuna sorğu göndərməkdir və layihənizi daha ətraflı öyrənib maliyyətini daha konkret adlandıracağıq. Texniki bir xüsusiyyətiniz yoxdursa, menecerlərimizlə əlaqə qurmaq üçün telefon nömrənizi buraxın. Yaxın gələcəkdə menecerlərimiz layihənin detallarını aydınlaşdırmaq üçün sizinlə əlaqə saxlayacaqlar.
            </p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="calculator_container">
                    <article class="service_form">
                        <div class="service_form_group">
                            <span class="service_form_group_name">Saytın növu:</span>
                            <div class="service_form_group_select">
                                <select class="service_form_group_select_name" name="site_type" id="">
                                    <option disabled selected>Saytın növünü seçin</option>
                                    <option value="2">Landing</option>
                                    <option value="2">Xəbər saytı</option>
                                    <option value="2">Onlayn Mağaza</option>
                                    <option value="2">Koperativ</option>
                                </select>

                            </div>
                            <span class="service_form_group_price">0</span>
                        </div>
                        <div class="service_form_group">
                            <span class="service_form_group_name">Dizayn:</span>
                            <div class="service_form_group_select">
                                <select name="site_type" id="">
                                    <option disabled selected>Dizayn seçin</option>
                                    <option value="2">İnteraktiv Dizayn</option>
                                    <option value="1">Sadə Dizayn</option>

                                </select>

                            </div>
                            <span class="service_form_group_price">0</span>
                        </div>
                        <div class="service_form_group">
                            <span class="service_form_group_name">Texniki Tapşırıq:</span>
                            <div class="service_form_group_select">
                                <select name="site_type" id="">
                                    <option disabled selected>*</option>
                                    <option value="2">Var</option>
                                    <option value="1">Yoxdur</option>

                                </select>

                            </div>
                            <span class="service_form_group_price">0</span>
                        </div>
                        <div class="service_form_group">
                            <span class="service_form_group_name">Hazırlanma Müddəti:</span>
                            <div class="service_form_group_select">
                                <select name="site_type" id="">
                                    <option disabled selected>*</option>
                                    <option value="2">Tələsirəm</option>
                                    <option value="1">Standart</option>

                                </select>

                            </div>
                            <span class="service_form_group_price">0</span>
                        </div>
                        <div class="service_form_group">
                            <span class="service_form_group_name">Funksionallıq:</span>
                            <div class="service_form_group_select">
                                <div class="service_form_group_multiselect_content">
                                    <input type="text" readonly="readonly" class="multiselect_preview" placeholder="secmek ucun buraya klikleyin">
                                    <ul class="service_form_group_multiselect_items">
                                        <label>
                                            <input type="checkbox" name="site_function" data-function-name="${item.name}" value="${item.pk}">
                                            Ödəmə sistemi
                                        </label>
                                        <label>
                                            <input type="checkbox" name="site_function" data-function-name="${item.name}" value="${item.pk}">
                                            Bir neçə dil
                                        </label>
                                        <label>
                                            <input type="checkbox" name="site_function" data-function-name="${item.name}" value="${item.pk}">
                                            Bir neçə dil
                                        </label>
                                        <label>
                                            <input type="checkbox" name="site_function" data-function-name="${item.name}" value="${item.pk}">
                                            Səbət Sistemi
                                        </label>
                                    </ul>
                                </div>

                            </div>
                            <span class="service_form_group_price">0</span>
                        </div>
                    </article>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="calculator-container">
                    <article class="calculator-checkout">
                        <div class="calculator-checkout_body">
                            <h3>Layihə smetası</h3>
                            <div class="calculator-checkout-item">
                                <span>Saytin novu</span>
                                <div class="calculator-checkout-item__price">0</div>
                                <div class="linec"></div>
                            </div>
                            <div class="calculator-checkout-item">
                                <span>Dizayn</span>
                                <div class="calculator-checkout-item__price">0</div>
                                <div class="linec"></div>
                            </div>
                            <div class="calculator-checkout-item">
                                <span>Texniki tapsiriq</span>
                                <div class="calculator-checkout-item__price">0</div>
                                <div class="linec"></div>
                            </div>
                            <div class="calculator-checkout-item">
                                <span>Hazirlanma muddeti</span>
                                <div class="calculator-checkout-item__price">0</div>
                                <div class="linec"></div>
                            </div>
                            <div class="calculator-checkout-item">
                                <span>Funksionallıq</span>
                                <div class="calculator-checkout-item__price">0</div>
                                <div class="linec"></div>
                            </div>
                        </div>
                    <div class="calculator-footer">
                        <h2>Toplam : <span id="id_calculator_total">0 &#8380;</span></h2>
                    </div>
                    </article>
                </div>
            </div>

        </div>
    </div>
</section>
-->
@endsection
