<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contactUs', function () {
    return view('contact');
});
Route::get('/myEvent', function () {
    return view('myEvent');
});
Route::get('/yourEvent', function () {
    return view('yourEvent');
});
Route::get('/addEvent', function () {return view('addEvent');});

Route::post('/addEvent/store', [App\Http\Controllers\EventController::class,'add'])->name('addEvent');

Route::get('/myEvent', [App\Http\Controllers\EventController::class,'show'])->name('myEvent');

Route::post('/updateEvent',[App\Http\Controllers\EventController::class,'update'])->name('updateEvent');

Route::get('/editEvent/{id}',[App\Http\Controllers\EventController::class,'edit'])->name('editEvent');

Route::get('/deleteEvent/{id}',[App\Http\Controllers\EventController::class,'delete'])->name('deleteEvent');

Route::get('/eventDetail/{id}',[App\Http\Controllers\eventController::class,'detail'])->name('eventDetail');

Route::post('/joinEvent',[App\Http\Controllers\eventController::class,'addCart'])->name('joinEvent');

/*  Route::get('/showEvent',[App\Http\Controllers\ProductController::class,'show'])->name('showEvent');

 Route::get('/editEvent/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('editEvent');
 
 Route::post('/updateEvent',[App\Http\Controllers\ProductController::class,'update'])->name('updateEvent');

 Route::get('/deleteEvent/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('deleteEvent');

 Route::post('/searchEvent',[App\Http\Controllers\ProductController::class,'searchEvent'])->name('searchEvent');

 

 

 Route::get('/myEvent',[App\Http\Controllers\CartController::class,'view'])->name('myCart');

 Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');
 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
