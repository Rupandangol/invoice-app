<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/login',[LoginController::class,'loginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return view('home.index');
    });
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/home',[HomeController::class,'index'])->name('home');
    Route::resource('/users',UserController::class);
    Route::resource('/invoices',InvoiceController::class);
    Route::get('/invoices/download/{id}',[InvoiceController::class,'download'])->name('invoices.download');
    Route::resource('/settings',SettingController::class);
});

