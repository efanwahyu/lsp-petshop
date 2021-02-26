<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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

Auth::routes();

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/merk/{merkId}', 'product-merk')->name('products.merk');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/checkout', 'checkout')->name('checkout');
Route::livewire('/history', 'history')->name('history');



Route::prefix('admin')->group(function(){
    Route::get('/',[Admin\Auth\LoginController::class,'loginForm']);
    Route::get('/login',[Admin\Auth\LoginController::class,'loginForm'])->name('admin.login');
    Route::post('/login',[Admin\Auth\LoginController::class,'login'])->name('admin.login');
    Route::get('/home',[Admin\AdminHomeController::class,'index'])->name('admin.home');
    Route::get('/logout',[Admin\Auth\LoginController::class,'logout'])->name('admin.logout');
});

Route::resource('/tester', 'ProductController');
Route::resource('/list', 'ListProductController');
Route::resource('/AdminMerk', 'MerkController');