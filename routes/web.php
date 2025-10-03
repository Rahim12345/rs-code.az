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
    Route::get('/partners', 'App\Http\Controllers\Admin\PartnerController@index');
    Route::post('/partners', 'App\Http\Controllers\Admin\PartnerController@store');
    Route::post('/edit-partner', 'App\Http\Controllers\Admin\PartnerController@edit')->name('edit.partner');
    Route::post('/delete-partner', 'App\Http\Controllers\Admin\PartnerController@delete');


    Route::get('/about', 'App\Http\Controllers\Admin\AboutController@index');
    Route::get('/about/edit', 'App\Http\Controllers\Admin\AboutController@edit');
    Route::post('/about/edit', 'App\Http\Controllers\Admin\AboutController@update');

    Route::resource('services', ServiceController::class);

    Route::get('service-changer/{id}', [App\Http\Controllers\ServiceController::class, 'serviceChanger'])
        ->name('service.changer');

    Route::post('service-loader', [App\Http\Controllers\ServiceController::class, 'loader'])
        ->name('service.loader');

    Route::resource('product', App\Http\Controllers\ProductController::class);
    Route::post('product-order', [\App\Http\Controllers\ProductController::class, 'ordered'])
        ->name('product.order');

    Route::get('product-image-deleter/{id}', [App\Http\Controllers\ProductImageController::class, 'deleter'])->name('image.deleter');

    Route::post('img-ordered', [App\Http\Controllers\ProductImageController::class, 'ordered'])->name('image.ordered');

    Route::resource('company', \App\Http\Controllers\CompanyController::class);

    Route::resource('team', TeamController::class);

    Route::get('/projects', 'App\Http\Controllers\Admin\ProjectController@index');
    Route::post('/projects', 'App\Http\Controllers\Admin\ProjectController@store');
    Route::post('/delete-project', 'App\Http\Controllers\Admin\ProjectController@delete');
    Route::post('/edit-project', 'App\Http\Controllers\Admin\ProjectController@edit')->name('edit.project');

    Route::get('/blogs', 'App\Http\Controllers\Admin\BlogController@index');
    Route::get('/add-blog', 'App\Http\Controllers\Admin\BlogController@index_add');
    Route::get('/edit-blog/{id}', 'App\Http\Controllers\Admin\BlogController@index_edit');
    Route::post('/edit-blog/{id}', 'App\Http\Controllers\Admin\BlogController@update');
    Route::post('/add-blog', 'App\Http\Controllers\Admin\BlogController@store');
    Route::post('/delete-blog', 'App\Http\Controllers\Admin\BlogController@delete');

    Route::get('/comments', 'App\Http\Controllers\Admin\CommentController@index');
    Route::get('/edit-comment/{id}', 'App\Http\Controllers\Admin\CommentController@index_edit');
    Route::post('/edit-comment/{id}', 'App\Http\Controllers\Admin\CommentController@update');

});

Route::prefix('admin')->middleware('isLogin')->group(static function () {
    Route::get('/login', static function () {
        return view('back.login');
    });
    Route::post('/login', 'App\Http\Controllers\Admin\AuthController@login');
});

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
    Route::get('/about', "App\Http\Controllers\Front\AboutController@index");
    Route::get('/contact', "App\Http\Controllers\Front\ContactController@index");
    Route::post('/contact', "App\Http\Controllers\Front\ContactController@mail")
        ->name('contact.post');
    Route::get('/services', "App\Http\Controllers\Front\ServiceController@index");
    Route::get('/portfolio/{slug?}', "App\Http\Controllers\Front\WorkController@index")
        ->name('front.portfolio');

    Route::post('servis-loader', [PagesController::class, 'servisLoader'])
        ->name('front.servis.loader');

    Route::get('/portfolio/{slug?}/{id}/{productID}', [PagesController::class, 'prodoctDetails'])
        ->name('front.prodoct.details');

    Route::get('/blogs', "App\Http\Controllers\Front\BlogController@index");
    Route::get('/faq', "App\Http\Controllers\Front\FaqController@index");
    Route::get('/blog-details/{slug}', "App\Http\Controllers\Front\BlogDetailsController@index");
    Route::get('/project-details/{slug}', "App\Http\Controllers\Front\ProjectDetailsController@index");

    Route::get('/veb-saytlarin-hazirlanmasi', [PagesController::class, 'vebSaytlarinHazirlanmasi']);
    Route::get('/seoblank', [PagesController::class, 'seoblank']);
    Route::get('/seo-xidmeti', [PagesController::class, 'seoXidmeti']);
    Route::get('/domen-nedir', [PagesController::class, 'domenNedir']);
    Route::get('/ssl-sertifikati-nedir', [PagesController::class, 'sslSertifikatiNedir']);
    Route::get('/smm-xidmeti', [PagesController::class, 'smmXidmeti']);
    Route::get('/google-reklamlari', [PagesController::class, 'googleReklamlari']);
    Route::get('/loqo-hazirlanmasi', [PagesController::class, 'loqoHazirlanmasi']);
    Route::get('/facebook-ve-instagram-reklamlari', [PagesController::class, 'facebookVeInstagramReklamlari']);
    Route::get('/backlink-nedir', [PagesController::class, 'backlinkNedir']);
    Route::get('/kontent-marketinq', [PagesController::class, 'kontentMarketinq']);
    Route::get('/texniki-destek', [PagesController::class, 'texnikiDestek']);
    Route::get('/korporativ-email', [PagesController::class, 'korporativEmail']);
});

Route::get('/language/{lang}', "App\Http\Controllers\Front\IndexController@lang")->name('front.lang');

