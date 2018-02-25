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

Route::get('/cart', function () {
    $cart = new App\Cart;
	$cart->addProduct("Baju Merah Mantap", 1);
	$cart->addProduct("Baju Merah Mantap", 1);
	$cart->addProduct("Bukuku", 3);
	$cart->removeProduct("Bukuku");
	$cart->addProduct("Singlet Hijau", 1);
	$cart->removeProduct("ProdukBohongan");
	echo $cart->showCart();
});

Route::resource('weight-log','WeightLogController');
