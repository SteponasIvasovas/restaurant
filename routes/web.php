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

Route::get('/welcome', function () {
    return view('welcome');
})->name("welcome");

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/reservation', 'ReservationController@create')->name('reservation.create')->middleware('auth');
Route::post('/reservation/store', 'ReservationController@store')->name('reservation.store')->middleware('auth');
Route::post('/cart', 'CartController@ajaxAdd')->name('cart.add');

//'middleware' => ['auth', 'admin'] - nuoroda i Kernel.php routeMiddleware apdorojima
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function(){
  Route::get('/', 'AdminController@index')->name('admin');
  Route::resource('/menu', 'MenuController');
  Route::resource('/dish', 'DishController');
});
