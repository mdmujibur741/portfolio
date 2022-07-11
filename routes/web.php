<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\portfolicontroller;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\siteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[siteController::class,'index'])->name('portfolio.index');
// admin route
Route::get('/wp-admin',[adminController::class,'dashboard'])->name('portfolio.dashboard');


// main route
Route::get('/main',[mainController::class,'main'])->name('portfolio.main');
Route::put('/main/update{id}',[mainController::class,'update'])->name('portfolio.update');

// services rote
Route::get('/service/index',[serviceController::class,'index'])->name('portfolio.service.index');
Route::get('/service',[serviceController::class,'create'])->name('portfolio.service.create');
Route::post('/service/store',[serviceController::class,'store'])->name('portfolio.service.store');
Route::get('/service/edit{id}',[serviceController::class,'edit'])->name('portfolio.service.edit');
Route::put('/service/update{id}',[serviceController::class,'update'])->name('portfolio.service.update');
Route::delete('/service/delete{id}',[serviceController::class,'destroy'])->name('portfolio.service.delete');


// portfolio route
Route::get('/portfolio/sec/index',[portfolicontroller::class,'index'])->name('portfolio.sec.index');
Route::get('/portfolio/sec/create',[portfolicontroller::class,'create'])->name('portfolio.sec.create');
Route::post('/portfolio/sec/store',[portfolicontroller::class,'store'])->name('portfolio.sec.store');
Route::get('/portfolio/sec/edit{id}',[portfolicontroller::class,'edit'])->name('portfolio.sec.edit');
Route::put('/portfolio/sec/update{id}',[portfolicontroller::class,'update'])->name('portfolio.sec.update');
Route::delete('/portfolio/sec/delete{id}',[portfolicontroller::class,'destroy'])->name('portfolio.sec.delete');


// about route
Route::get('/portfolio/about/index',[aboutController::class,'index'])->name('portfolio.about.index');
Route::get('/portfolio/about/create',[aboutController::class,'create'])->name('portfolio.about.create');
Route::post('/portfolio/about/store',[aboutController::class,'store'])->name('portfolio.about.store');
Route::get('/portfolio/about/edit{id}',[aboutController::class,'edit'])->name('portfolio.about.edit');
Route::put('/portfolio/about/update{id}',[aboutController::class,'update'])->name('portfolio.about.update');
Route::delete('/portfolio/about/delete{id}',[aboutController::class,'destroy'])->name('portfolio.about.delete');

// contact route
Route::get('/contact/index',[contactController::class,'index'])->name('portfolio.contact.index');
Route::post('/contact/store',[contactController::class,'store'])->name('portfolio.contact.store');
Route::delete('/contact/delete{id}',[contactController::class,'destroy'])->name('portfolio.contact.destroy');