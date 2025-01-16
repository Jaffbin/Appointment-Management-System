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
Route::get('/home', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});


Route::get('/addEvent', function () {return view('addEvent');});

Route::get('/home', [App\Http\Controllers\EventController::class,'home'])->name('home');

Route::get('/profile', [App\Http\Controllers\EventController::class,'profile'])->name('profile');

Route::get('/editProfile', [App\Http\Controllers\EventController::class, 'editProfile'])->name('editProfile');

Route::post('/updateProfile', [App\Http\Controllers\EventController::class, 'updateProfile'])->name('updateProfile');

Route::post('/addEvent', [App\Http\Controllers\EventController::class,'add'])->name('addEvent');

Route::get('/myEvent', [App\Http\Controllers\EventController::class,'show'])->name('myEvent');

Route::get('/showAllEvent', [App\Http\Controllers\EventController::class,'showAll'])->name('showAllEvent');

Route::post('/updateEvent',[App\Http\Controllers\EventController::class,'update'])->name('updateEvent');

Route::get('/editEvent/{id}',[App\Http\Controllers\EventController::class,'edit'])->name('editEvent');

Route::get('/deleteEvent/{id}',[App\Http\Controllers\EventController::class,'delete'])->name('deleteEvent');

Route::get('/eventDetail/{id}',[App\Http\Controllers\eventController::class,'detail'])->name('eventDetail');

Auth::routes();

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('/joinEvent',[App\Http\Controllers\eventController::class,'joinEvent'])->name('joinEvent');