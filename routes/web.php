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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//'middleware' => ['auth', 'admin'] - nuoroda i Kernel.php routeMiddleware apdorojima
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function(){
  Route::get('/', 'AdminController@index')->name('admin');
  Route::resource('/menu', 'MenuController');
  Route::resource('/dish', 'DishController');
});
