<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstimateController;

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

Auth::routes(['register' => false]);

Route::middleware(['guest'])->group(function(){

    Route::get('/pre-register', function(){
        return view('/auth/pre_register');
    })->name('pre-register');

    Route::get('/pre-complete', function(){
        return view('/auth/pre_complete');
    })->name('pre-complete');

    Route::get('/verify/{token}', [App\Http\Controllers\PreUserController::class, 'verify'])->name('verify');

    Route::post('/pre-register', [App\Http\Controllers\PreUserController::class, 'store'])->name('pre-register.store');

    Route::post('/auth/upgrade/{token}', [App\Http\Controllers\PreUserController::class, 'upgrade'])->name('auth.upgrade');

});

Route::middleware(['auth'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/estimate/index', function(){
        return view('/estimate/index');
    });
   
    //見積もり作成
    Route::get('/estimate/create', function(){
        return view('/estimate/create');
    });


    // debug
    Route::get('/estimate/show', function() {
        return view('/estimate/show');
    });


    //DB処理を行う(あとでpost先変える)
    //Route::post('/estimate/show', [CreateController::class, 'createEstimate']);
    Route::post('/estimate/index', [EstimateController::class, 'store']);
});
