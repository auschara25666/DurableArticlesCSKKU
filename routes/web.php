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

use App\Equipment;
use App\Rent;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;

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
    Route::resource('manage-personal', 'ManagePersonalController');
    Route::resource('manage-student', 'ManageStudentController');
    Route::resource('/student', 'StudentController');

    Route::get('equipment/{id}/{categories}', 'EquipmentController@show');


    Route::get('/admin', function () {
        return view('admin.home-admin');
    });

    Route::get('/user-equipment', function () {
        $equipment = Equipment::where('equipment_role', 2)->get();
        return view('user.equipment-user', compact('equipment'));
    });
    Route::get('/user-rent', function () {
        $rent = Rent::where('user_id', Auth::user()->id)->get();
        return view('user.rent-user', compact('rent'));
    });
    Route::get('/repair', function () {
        $equipment = Equipment::where('equipment_role', 2)->get();
        return view('user.repair', compact('equipment'));
    });

    Route::get('/manageuser', function () {
        return view('admin.manageuser');
    });

    view()->composer('layouts.app-admin', function ($view) {
        $view->with('active', \App\User::where('user_status', '0')->get());
    });
});
