<?php

use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreeSeoAuditController;
use UniSharp\LaravelFilemanager\Lfm;

Route::group(['prefix' => 'filemanager', 'middleware' => ['auth']], static function () {
    Lfm::routes();
});

Route::prefix('admin')->middleware('isLogout')->group(function () {
    Route::get('/', static function () {
        return view('back.dashboard');
    });

    Route::get('/dashboard', static function () {
        return view('back.dashboard');
    });

    Route::get('/logout', 'App\Http\Controllers\Admin\AuthController@logout');

    // Profile
    Route::get('/profile', 'App\Http\Controllers\Admin\ProfileController@index')->name('admin.profile');
    Route::post('/profile/update', 'App\Http\Controllers\Admin\ProfileController@updateProfile')->name('admin.profile.update');
    Route::post('/profile/password', 'App\Http\Controllers\Admin\ProfileController@updatePassword')->name('admin.profile.password');
    Route::get('/profile/2fa-setup', 'App\Http\Controllers\Admin\ProfileController@setup2fa')->name('admin.2fa.setup');
    Route::post('/profile/2fa-enable', 'App\Http\Controllers\Admin\ProfileController@enable2fa')->name('admin.2fa.enable');
    Route::post('/profile/2fa-disable', 'App\Http\Controllers\Admin\ProfileController@disable2fa')->name('admin.2fa.disable');
    Route::get('/profile/backup', 'App\Http\Controllers\Admin\ProfileController@backup')->name('admin.backup');
    Route::get('/partners', 'App\Http\Controllers\Admin\PartnerController@index');
    Route::post('/partners', 'App\Http\Controllers\Admin\PartnerController@store');
    Route::post('/edit-partner', 'App\Http\Controllers\Admin\PartnerController@edit')->name('edit.partner');
    Route::post('/delete-partner', 'App\Http\Controllers\Admin\PartnerController@delete');
    Route::post('/partner-reorder', 'App\Http\Controllers\Admin\PartnerController@reorder')->name('partner.reorder');


    Route::get('/about', 'App\Http\Controllers\Admin\AboutController@index');
    Route::get('/about/edit', 'App\Http\Controllers\Admin\AboutController@edit');
    Route::post('/about/edit', 'App\Http\Controllers\Admin\AboutController@update');

    // Notes
    Route::get('/notes', 'App\Http\Controllers\Admin\NoteController@index');
    Route::get('/notes/create', 'App\Http\Controllers\Admin\NoteController@create');
    Route::post('/notes', 'App\Http\Controllers\Admin\NoteController@store');
    Route::get('/notes/{id}/edit', 'App\Http\Controllers\Admin\NoteController@edit');
    Route::put('/notes/{id}', 'App\Http\Controllers\Admin\NoteController@update');
    Route::post('/notes/delete', 'App\Http\Controllers\Admin\NoteController@destroy');

    // Note Categories
    Route::get('/note-categories', 'App\Http\Controllers\Admin\NoteCategoryController@index');
    Route::get('/note-categories/create', 'App\Http\Controllers\Admin\NoteCategoryController@create');
    Route::post('/note-categories', 'App\Http\Controllers\Admin\NoteCategoryController@store');
    Route::get('/note-categories/{id}/edit', 'App\Http\Controllers\Admin\NoteCategoryController@edit');
    Route::put('/note-categories/{id}', 'App\Http\Controllers\Admin\NoteCategoryController@update');
    Route::post('/note-categories/delete', 'App\Http\Controllers\Admin\NoteCategoryController@destroy');

    Route::resource('services', ServiceController::class);

    Route::get('service-changer/{id}', [App\Http\Controllers\ServiceController::class, 'serviceChanger'])
        ->name('service.changer');

    Route::post('service-loader', [App\Http\Controllers\ServiceController::class, 'loader'])
        ->name('service.loader');

    Route::resource('product', App\Http\Controllers\ProductController::class);
    Route::post('product-order', [\App\Http\Controllers\ProductController::class, 'ordered'])
        ->name('product.order');
    Route::post('product-reorder', [\App\Http\Controllers\ProductController::class, 'reorder'])
        ->name('product.reorder');

    Route::get('product-image-deleter/{id}', [App\Http\Controllers\ProductImageController::class, 'deleter'])->name('image.deleter');
    Route::delete('product-image/{id}', [App\Http\Controllers\ProductImageController::class, 'destroyAjax'])->name('image.destroy');

    Route::post('img-ordered', [App\Http\Controllers\ProductImageController::class, 'ordered'])->name('image.ordered');

    Route::resource('company', \App\Http\Controllers\CompanyController::class);

    Route::resource('team', TeamController::class);
    Route::post('team-reorder', [TeamController::class, 'reorder'])->name('team.reorder');

    Route::get('/contacts',         'App\Http\Controllers\Admin\ContactAdminController@index');
    Route::get('/contacts/{id}',    'App\Http\Controllers\Admin\ContactAdminController@show');
    Route::post('/delete-contact',  'App\Http\Controllers\Admin\ContactAdminController@delete');

    Route::get('/brifs',              'App\Http\Controllers\Admin\BrifAdminController@index');
    Route::get('/brifs/{type}/{id}',  'App\Http\Controllers\Admin\BrifAdminController@show');
    Route::post('/delete-brif',       'App\Http\Controllers\Admin\BrifAdminController@delete');

    Route::get('/visitors', 'App\Http\Controllers\Admin\VisitorController@index');
    Route::get('/visitors/links', 'App\Http\Controllers\Admin\LinkClickAdminController@index');

    Route::get('/seo',            'App\Http\Controllers\Admin\SeoSettingsController@index');
    Route::post('/seo/robots',    'App\Http\Controllers\Admin\SeoSettingsController@saveRobots');

    Route::get('/projects', 'App\Http\Controllers\Admin\ProjectController@index');
    Route::get('/add-project', 'App\Http\Controllers\Admin\ProjectController@index_add');
    Route::post('/add-project', 'App\Http\Controllers\Admin\ProjectController@store');
    Route::get('/edit-project/{id}', 'App\Http\Controllers\Admin\ProjectController@index_edit');
    Route::post('/edit-project/{id}', 'App\Http\Controllers\Admin\ProjectController@update');
    Route::post('/delete-project', 'App\Http\Controllers\Admin\ProjectController@delete');
    Route::post('/toggle-project-home/{id}', 'App\Http\Controllers\Admin\ProjectController@toggleHome');
    Route::delete('/project-image-delete/{id}', 'App\Http\Controllers\Admin\ProjectController@deleteImage');

    Route::get('/blogs', 'App\Http\Controllers\Admin\BlogController@index');
    Route::get('/add-blog', 'App\Http\Controllers\Admin\BlogController@index_add');
    Route::get('/edit-blog/{id}', 'App\Http\Controllers\Admin\BlogController@index_edit');
    Route::post('/edit-blog/{id}', 'App\Http\Controllers\Admin\BlogController@update');
    Route::post('/add-blog', 'App\Http\Controllers\Admin\BlogController@store');
    Route::post('/delete-blog', 'App\Http\Controllers\Admin\BlogController@delete');

    Route::get('/comments', 'App\Http\Controllers\Admin\CommentController@index');
    Route::get('/edit-comment/{id}', 'App\Http\Controllers\Admin\CommentController@index_edit');
    Route::post('/edit-comment/{id}', 'App\Http\Controllers\Admin\CommentController@update');
    Route::post('/delete-comment', 'App\Http\Controllers\Admin\CommentController@delete');

});

Route::prefix('admin')->middleware('isLogin')->group(static function () {
    Route::get('/login', static function () {
        return view('back.login');
    });
    Route::post('/login', 'App\Http\Controllers\Admin\AuthController@login');
    Route::get('/2fa-challenge', 'App\Http\Controllers\Admin\AuthController@twofaChallenge')->name('2fa.challenge');
    Route::post('/2fa-challenge', 'App\Http\Controllers\Admin\AuthController@twofaVerify')->name('2fa.verify');
});

Route::post('/track-click', 'App\Http\Controllers\Front\LinkClickController@track')->name('track.click');
Route::get('/sitemap.xml', 'App\Http\Controllers\Front\SitemapController@index');
Route::get('/robots.txt',  'App\Http\Controllers\Front\RobotsController@index');

Route::middleware('locale')->group(static function () {
    Route::get('/', "App\Http\Controllers\Front\IndexController@index");

    Route::post('/brif-modal-one', [PagesController::class, 'brifModalOne'])
        ->name('front.brif.modal.one');
    Route::post('/brif-modal-two', [PagesController::class, 'brifModalTwo'])
        ->name('front.brif.modal.two');
    Route::post('/brif-modal-three', [PagesController::class, 'brifModalThree'])
        ->name('front.brif.modal.three');
    Route::post('/brif-modal-four', [PagesController::class, 'brifModalFour'])
        ->name('front.brif.modal.four');
    Route::post('/brif-modal-five', [PagesController::class, 'brifModalFive'])
        ->name('front.brif.modal.five');


    Route::resource('free-seo-audit', FreeSeoAuditController::class);
    // About — AZ / EN / RU
    Route::get('/haqqimizda', "App\Http\Controllers\Front\AboutController@index");
    Route::get('/about',      "App\Http\Controllers\Front\AboutController@index");
    Route::get('/o-nas',      "App\Http\Controllers\Front\AboutController@index");

    // Contact — AZ / EN / RU
    Route::get('/elaqe',    "App\Http\Controllers\Front\ContactController@index");
    Route::get('/contact',  "App\Http\Controllers\Front\ContactController@index");
    Route::get('/kontakty', "App\Http\Controllers\Front\ContactController@index");
    Route::post('/contact', "App\Http\Controllers\Front\ContactController@mail")
        ->name('front.contact.mail');

    // Services — AZ / EN / RU
    Route::get('/xidmetler', "App\Http\Controllers\Front\ServiceController@index");
    Route::get('/services',  "App\Http\Controllers\Front\ServiceController@index");
    Route::get('/uslugi',    "App\Http\Controllers\Front\ServiceController@index");

    // Portfolio — AZ / EN / RU
    Route::get('/isler/{slug?}',        "App\Http\Controllers\Front\WorkController@index");
    Route::get('/portfolio/{slug?}',    "App\Http\Controllers\Front\WorkController@index")->name('front.portfolio');
    Route::get('/portfolio-ru/{slug?}', "App\Http\Controllers\Front\WorkController@index");

    Route::post('servis-loader', [PagesController::class, 'servisLoader'])
        ->name('front.servis.loader');

    Route::get('/portfolio/{slug?}/{id}/{productID}', [PagesController::class, 'prodoctDetails'])
        ->name('front.prodoct.details');

    // Blogs — AZ / EN / RU
    Route::get('/bloqlar', "App\Http\Controllers\Front\BlogController@index");
    Route::get('/blogs',   "App\Http\Controllers\Front\BlogController@index");
    Route::get('/blogi',   "App\Http\Controllers\Front\BlogController@index");

    // FAQ — AZ / EN / RU
    Route::get('/suallar',                    "App\Http\Controllers\Front\FaqController@index");
    Route::get('/faq',                        "App\Http\Controllers\Front\FaqController@index");
    Route::get('/chasto-zadavaemye-voprosy',  "App\Http\Controllers\Front\FaqController@index");
    Route::get('/blog-details/{id}', "App\Http\Controllers\Front\BlogDetailsController@index");
    Route::get('/project-details/{slug}', "App\Http\Controllers\Front\ProjectDetailsController@index");

    // Web Development — AZ / EN / RU
    Route::get('/veb-saytlarin-hazirlanmasi', [PagesController::class, 'vebSaytlarinHazirlanmasi']);
    Route::get('/website-development',         [PagesController::class, 'vebSaytlarinHazirlanmasi']);
    Route::get('/razrabotka-sajtov',           [PagesController::class, 'vebSaytlarinHazirlanmasi']);

    // SEO — AZ / EN / RU
    Route::get('/seo-xidmeti',   [PagesController::class, 'seoXidmeti']);
    Route::get('/seo-services',  [PagesController::class, 'seoXidmeti']);
    Route::get('/seo-uslugi',    [PagesController::class, 'seoXidmeti']);

    // Domain — AZ / EN / RU
    Route::get('/domen-nedir',       [PagesController::class, 'domenNedir']);
    Route::get('/what-is-domain',    [PagesController::class, 'domenNedir']);
    Route::get('/chto-takoe-domen',  [PagesController::class, 'domenNedir']);

    // SSL — AZ / EN / RU
    Route::get('/ssl-sertifikati-nedir',    [PagesController::class, 'sslSertifikatiNedir']);
    Route::get('/what-is-ssl-certificate',  [PagesController::class, 'sslSertifikatiNedir']);
    Route::get('/chto-takoe-ssl-sertifikat',[PagesController::class, 'sslSertifikatiNedir']);

    // SMM — AZ / EN / RU
    Route::get('/smm-xidmeti',  [PagesController::class, 'smmXidmeti']);
    Route::get('/smm-services', [PagesController::class, 'smmXidmeti']);
    Route::get('/smm-uslugi',   [PagesController::class, 'smmXidmeti']);

    // Google Ads — AZ / EN / RU
    Route::get('/google-reklamlari', [PagesController::class, 'googleReklamlari']);
    Route::get('/google-ads',         [PagesController::class, 'googleReklamlari']);
    Route::get('/reklama-google',     [PagesController::class, 'googleReklamlari']);

    // Logo — AZ / EN / RU
    Route::get('/loqo-hazirlanmasi', [PagesController::class, 'loqoHazirlanmasi']);
    Route::get('/logo-design',        [PagesController::class, 'loqoHazirlanmasi']);
    Route::get('/razrabotka-logo',    [PagesController::class, 'loqoHazirlanmasi']);

    // Facebook/Instagram Ads — AZ / EN / RU
    Route::get('/facebook-ve-instagram-reklamlari', [PagesController::class, 'facebookVeInstagramReklamlari']);
    Route::get('/facebook-instagram-ads',            [PagesController::class, 'facebookVeInstagramReklamlari']);
    Route::get('/reklama-facebook-instagram',        [PagesController::class, 'facebookVeInstagramReklamlari']);

    // Backlink — AZ / EN / RU
    Route::get('/backlink-nedir',      [PagesController::class, 'backlinkNedir']);
    Route::get('/what-is-backlink',    [PagesController::class, 'backlinkNedir']);
    Route::get('/chto-takoe-backlink', [PagesController::class, 'backlinkNedir']);

    // Content Marketing — AZ / EN / RU
    Route::get('/kontent-marketinq',  [PagesController::class, 'kontentMarketinq']);
    Route::get('/content-marketing',  [PagesController::class, 'kontentMarketinq']);
    Route::get('/kontent-marketing',  [PagesController::class, 'kontentMarketinq']);

    // Technical Support — AZ / EN / RU
    Route::get('/texniki-destek',              [PagesController::class, 'texnikiDestek']);
    Route::get('/technical-support',           [PagesController::class, 'texnikiDestek']);
    Route::get('/tekhnicheskaya-podderzhka',   [PagesController::class, 'texnikiDestek']);

    // Corporate Email — AZ / EN / RU
    Route::get('/korporativ-email',       [PagesController::class, 'korporativEmail']);
    Route::get('/corporate-email',        [PagesController::class, 'korporativEmail']);
    Route::get('/korporativnaya-pochta',  [PagesController::class, 'korporativEmail']);

    Route::get('/seoblank', [PagesController::class, 'seoblank']);

    // Dev Notes (manual access only — not in nav)
    Route::get('/dev-notes',      'App\Http\Controllers\Front\NoteController@index');
    Route::get('/dev-notes/{id}', 'App\Http\Controllers\Front\NoteController@show');
});

Route::get('/language/{lang}', "App\Http\Controllers\Front\IndexController@lang")->name('front.lang');

