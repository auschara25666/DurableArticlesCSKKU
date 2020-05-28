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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('categorieslist', 'CategoriesListController');
    Route::resource('equipment', 'EquipmentController');
    Route::resource('news', 'NewsController');
    Route::resource('rent', 'RentController');
    Route::resource('user', 'UserController');

    Route::get('/admin', function () {
        return view('admin.home-admin');
    });
    Route::get('/manageuser', function () {
        return view('admin.manageuser');
    });
});
