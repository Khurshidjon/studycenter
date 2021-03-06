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

use App\Address;
use App\SiteMenu;
use App\Social;

View::composer('layouts.main', function($views){
        $menus = SiteMenu::where('parent_id', null)->where('position', 1)->get();
        $footer_menus = SiteMenu::where('position', 2)->get();
        $address = Address::first();
        $social = Social::first();
        $views->with([
            'menus' => $menus,
            'footer_menus' => $footer_menus,
            'address' => $address,
            'social' => $social
        ]);
});

Route::get('index/{lang}', function ($lang) {
    \Session::put('lang', $lang);
    return redirect()->back();
})->name('locale');


Route::get('/', 'HomeController@index')->name('index');
Route::get('/news', 'HomeController@blog')->name('news');
Route::get('/blog/{post}', 'HomeController@singleBlog')->name('single-news');
Route::get('/universities/{country}', 'UniversityController@index')->name('universities.index');
Route::get('/universities/{university}/show', 'UniversityController@show')->name('universities.show');
Route::get('/courses/{course}/show', 'CourseController@show')->name('course.show');
Route::get('/contacts', 'HomeController@contacts')->name('contact-us');
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
Route::post('/message', 'HomeController@subject')->name('subject');
Route::get('/refresh-captcha', 'HomeController@captchaRefresh')->name('refresh_captcha');
Route::get('/consulting', 'HomeController@consulting')->name('consulting');
Route::get('/languages', 'HomeController@languages')->name('languages');
Route::get('/work-and-study', 'HomeController@workAndStudy')->name('work-and-study');
Route::get('/classes', 'HomeController@classes')->name('courses');
Route::get('/teachers', 'HomeController@teachers')->name('teachers');
Route::get('/schedules', 'HomeController@schedules')->name('schedules');
Route::get('/benefits', 'HomeController@benefits')->name('benefits');
Route::get('/complex-testing-center', 'HomeController@complexTest')->name('complex-test');

Route::get('/gallery', 'HomeController@gallery')->name('albums');
Route::get('/gallery-items/{album}', 'HomeController@galleryItems')->name('gallery.items');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('/blogs', 'BlogController@store')->name('voyager.blogs.store');
    Route::put('/blogs/{blog}', 'BlogController@update')->name('voyager.blogs.update');
});

Auth::routes();

