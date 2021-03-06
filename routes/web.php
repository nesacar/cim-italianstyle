<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', function () {
    return view('layouts.admin-app');
});

Route::get('proba', 'PagesController@proba');

// filemanager
Route::middleware('auth')->get('filemanager/show', 'FilemanagerController@index');

Route::post('form', 'PagesController@sendForm');

Route::post('upload-cv', 'PagesController@uploadCv');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function() {
        Route::get('/', 'PagesController@index');
        Route::get('collections', 'PagesController@index');
        Route::get('collezioni', 'PagesController@index');

        Route::get('products/brand-names/projecthospitality/519', 'PagesController@brandNames');
        Route::get('products/brand-names/progettoospitalita/519', 'PagesController@brandNames');

        Route::get('collections/{slug}', 'PagesController@collections');
        Route::get('collezioni/{slug}', 'PagesController@collections');

        Route::get('collections/{slug1}/{slug2}', 'PagesController@parentCollections');
        Route::get('collezioni/{slug1}/{slug2}', 'PagesController@parentCollections');

        Route::get('contact', 'PagesController@contact')->name('contact');
        Route::get('contatto', 'PagesController@contact')->name('contact');

        Route::get('corporate', 'PagesController@corporate')->name('corporate');
        Route::get('azienda', 'PagesController@corporate')->name('corporate');

        Route::get('work-with-us', 'PagesController@partnership')->name('work-with-us'); //partnership
        Route::get('lavora-con-noi', 'PagesController@partnership')->name('work-with-us'); // partner

        Route::get('promozioni', 'PagesController@promotions')->name('promotions');
        Route::get('promotions', 'PagesController@promotions')->name('promotions');

        Route::get('news', 'PagesController@news')->name('news');

        Route::get('shop-online', 'PagesController@shopOnline')->name('shop-online');
        Route::get('vendita-on-line', 'PagesController@shopOnline')->name('shop-online');

        Route::get('news/{slug}/{id}', 'PagesController@post')->name('post');
        Route::get('notizia/{slug}/{id}', 'PagesController@post')->name('post');

        Route::get('products/{slug1}/{slug2}/{id}', 'PagesController@products')->name('products');
        Route::get('products/{slug1}/{slug2}/{slug3}/{id}', 'PagesController@products2')->name('products2');

        Route::get('{slug1}/{slug2}/{id}', 'PagesController@product')->name('product');
        Route::get('{slug1}/{slug2}/{slug3}/{id}', 'PagesController@product2')->name('product2');
    }
);