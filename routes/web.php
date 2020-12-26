<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

//frontend

Route::get('package/{id}/{slug}', 'FrontController@packagecategory');
Route::get('view-package/{id}/{slug}', 'FrontController@singlepost');

Route::get('air-ticket/{id}/{slug}', 'FrontController@airticketcategory');
Route::get('view-ticket/{id}/{slug}', 'FrontController@singleairticket');

Route::get('view-hotel/{id}/{slug}', 'FrontController@singleairhotel');

Route::get('ceo-massage', 'FrontController@ceomassage');
Route::get('about-company', 'FrontController@about');
Route::get('photo-gallery', 'FrontController@photogallery');
Route::get('contact', 'FrontController@contactus');

Route::get('hotel_bookings', 'FrontController@hotel_bookings');

//
Route::get('/home', 'HomeController@index')->name('home');
// ----------------------------------------------------------------------------
//package_category_name
Route::resource('package-category', 'Admin\PackagecategoryController');
Route::PUT('/package-category-update','Admin\DestinationController@update');
Route::resource('package-subcategory', 'Admin\SubcategoryController');
//contact_us
Route::resource('contact_us', 'Admin\ContactController');
Route::PUT('/contact-us-update','Admin\ContactController@update');

Route::get('visa/{id}/{slug}', 'FrontController@visaservice');
Route::get('view-visa/{id}/{slug}', 'FrontController@singlevisa');

//package
Route::resource('packages', 'Admin\PackageController');

//visa
Route::resource('visas', 'Admin\VisaController');
Route::PUT('/visas-update','Admin\VisaController@update');

//visa_service
Route::resource('visa_services', 'Admin\VisaserviceController');
//air-tickets
Route::resource('air-tickets', 'Admin\AirticketController');

//ceo
Route::get('ceo/massage', 'Admin\CeoController@index')->name('ceo.massage');
Route::post('ceo/update/{id}', 'Admin\CeoController@update')->name('ceo.update');

//about
Route::get('about', 'Admin\CeoController@aboutindex');
Route::post('about/update/{id}', 'Admin\CeoController@aboutupdate')->name('about.update');

//air ticket category
Route::resource('ticket-categories', 'Admin\TicketcategoryController');
Route::PUT('/ticket-categories-update','Admin\DestinationController@update');

//air ticket subcategory
Route::resource('ticket-subcategories', 'Admin\TicketsubcategoryController');
// Route::PUT('/ticket-categories-update','Admin\DestinationController@update');
//site settings
Route::get('site/config', 'Admin\ConfigController@index')->name('site.config');
// Route::post('config/update/{id}', 'Admin\ConfigController@update')->name('config.update');

Route::post('update/config/withoutphoto/{id}', 'Admin\ConfigController@update');
Route::post('update/config/photo/{id}', 'Admin\ConfigController@updatephoto');
Route::post('update/config/social/{id}', 'Admin\ConfigController@updatesocial');

//hotel booking
Route::resource('hotel-booking', 'HotelController');

//slider
Route::resource('sliders', 'Admin\SliderController');
//agent
Route::resource('agents', 'Admin\AgentController');
//partners
Route::resource('partners', 'Admin\PartnerController');
// photo-gallery
Route::resource('gallery', 'Admin\GallerController');

// ---------------------------------------------------------------------

View::composer('layouts.frontend',function ($view) {
  $package_category = App\Package_category::get();
  $view->with('package_category',$package_category);
});

View::composer('layouts.frontend',function ($view) {
  $config = App\Config::first();
  $view->with('config',$config);
});

View::composer('single',function ($view) {
  $config = App\Config::first();
  $view->with('config',$config);
});

View::composer('layouts.frontend',function ($view) {
  $visa = App\Visa::get();
  $view->with('visa',$visa);
});

View::composer('layouts.frontend.slider',function ($view) {
  $slider = App\Slider::get();
  $view->with('slider',$slider);
});





