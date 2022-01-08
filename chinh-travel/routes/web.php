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
    return view('user.index');
});
Route::get('/gallery', function () {
    return view('user.gallery');
});
Route::get('/about', function () {
    return view('user.about');
});
Route::get('/accomodation', function () {
    return view('user.accomodation');
});
Route::get('/contact', function () {
    return view('user.contact');
});
Route::get('/contact', function () {
    return view('user.contact');
});

Route::get('/orders', 'User\OrdersController@getOrder');
Route::post('/orders', 'User\OrdersController@getQuickOrder');

Route::get('/checkout', 'User\CheckoutController@getCheckout');
Route::post('/checkout', 'User\CheckoutController@postCheckout');

Route::get('/list-order', 'User\PaymentController@getListOrder');

Auth::routes(); //trong nay co /login va /regiter san

Route::get('/home', 'HomeController@index')->name('home');
