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

Route::get('/pre-register', function(){
    return view('/auth/pre_register');
});

Route::get('/pre-complete', function(){
    return view('/auth/pre_complete');
})->name('pre-complete');

Route::get('/verify/{token}', [App\Http\Controllers\PreUserController::class, 'verify'])->name('verify');

Route::post('/pre-register', [App\Http\Controllers\PreUserController::class, 'store'])->name('pre-register.store');

Route::middleware(['auth'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/estimate/index', function(){
        return view('/estimate/index');
    });

    Route::get('/estimate/create', function(){
        return view('/estimate/create');
    });

    // debug
    Route::get('/estimate/show', function() {
        return view('/estimate/show');
    });

    Route::post('/estimate/show', [CreateController::class, 'createEstimate']);
});
