<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->name('website');
Route::get('/AboutUs',[HomeController::class,'aboutWebsite'])->name('aboutWebsite');
Route::get('/blogs',[HomeController::class,'blogs'])->name('blogs');
Route::get('/gallerys',[HomeController::class,'gallerys'])->name('gallerys');
Route::get('/contactus',[HomeController::class,'contactus'])->name('contactus');
Route::get('/blogs/details/{id}',[HomeController::class,'blogsDetails'])->name('blogsDetails');

Route::get('products/{id}',[HomeController::class,'product'])->name('products');
Route::get('products/details/{id}',[HomeController::class,'productsDetails'])->name('productsDetails');


Route::post('sendContact', [HomeController::class, 'sendContact'])->name('sendContact');