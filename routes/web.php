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
    return redirect()->route('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile/{id}', 'ProfileController@update')->name('updateProfile');
});

Route::group(['middleware' => ['lvl.au', 'auth']], function () {
    Route::resource('toko', 'InformasiTokoController');
    Route::resource('pengguna', 'PenggunaController');
});

Route::group(['middleware' => ['lvl.ag', 'auth']], function () {
    Route::resource('currencies', 'CurrencyController');
    Route::resource('ppn', 'PpnController');
    Route::resource('unit', 'UnitController');
    Route::resource('pers', 'PersentaseKeuntunganController');
    Route::resource('bahan', 'BahanController');
    Route::resource('category', 'CategoryController');
    Route::resource('produk', 'ProdukController');
    Route::resource('produkkosong', 'ProdukKosongController');
    Route::get('produkmasuk', 'ProdukMasukController@index')->name('produkmasuk');
});

Route::group(['middleware' => ['lvl.k', 'auth']], function () {
    Route::resource('transaksi', 'TransaksiController');
    Route::get('transaksiClean', 'TransaksiController@transaksiClean')->name('transaksiClean');
    Route::resource('checkout', 'CheckoutController');
    Route::resource('invoice', 'InvoiceController');
});

Route::group(['prefix' => 'print'], function () {
    Route::get('users', 'AppController\UserController@print')->name("printUsers");

    Route::get('kategoriProduk', 'KategoriController@print')->name("printKategoriProduk");
    Route::get('produkmasuk', 'ProdukMasukController@print')->name("printProdukMasuk");
    Route::get('produkkosong', 'ProdukKosongController@print')->name("printProdukKosong");

    Route::get('riwayatTransaksi', 'InvoiceController@print')->name("printRiwayatTransaksi");
});
