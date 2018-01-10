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
Route::post('/cart/add', 'CartController@ajaxAdd')->name('cart.add');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/{id}', 'CartController@deleteByOne')->name('cart.deleteByOne');
Route::post('/cart/deleteAll', 'CartController@deleteAll')->name('cart.deleteAll');
Route::post('/cart/deleteCart', 'CartController@deleteCart')->name('cart.deleteCart');
Route::get('/order', 'OrderController@index')->name('order');
Route::post('/order/store', 'OrderController@store')->name('order.store');

//'middleware' => ['auth', 'admin'] - nuoroda i Kernel.php routeMiddleware apdorojima
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function(){
  Route::get('/', 'AdminController@index')->name('admin');
  Route::resource('/menu', 'MenuController');
  Route::resource('/dish', 'DishController');
});
Route::get('storage/images/{filename}', function ($filename)
{
    $path = storage_path('app/public/images/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
