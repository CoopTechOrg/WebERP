<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Estimate\CreateController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/estimate/create', function(){
    return view('/estimate/create');
});

// debug
Route::get('/estimate/show', function() {
    return view('/estimate/show');
});


Route::post('/estimate/show', [CreateController::class, 'createEstimate']);