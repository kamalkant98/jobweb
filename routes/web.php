<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\auth\register_company;
use App\Http\Controllers\auth\ForgotPassword;



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

    
Route::get('/',[webController::class,'index'])->name('home');
Route::get('/home',[webController::class,'index']); 
Route::post('/search',[webController::class,'search'])->name('search'); 

Route::get('category/{name}',[webController::class,'subcategory']);
Route::get('/jobs',[webController::class,'jobs'])->name('jobs');
Route::get('/jobs/job_details/{id}',[webController::class,'job_details'])->name('job_details');
Route::any('/jobfilter',[webController::class,'jobfilter'])->name('jobfilter'); 

Route::get('/logout',[loginController::class,'logout'])->name('logout');
Route::post('/loginuser',[loginController::class,'login'])->name('loginuser');
Route::view('/login','auth.login')->name('login');

Route::view('/register','auth.register')->name('register');
Route::post('user_register',[registerController::class,'user_register'])->name('user_register');

Route::view('/register_company','auth.register_company')->name('register_company');
Route::post('employer_create',[register_company::class,'employer_create'])->name('employer_create');

Route::view('/forgot_password','auth.passwords.ForgotPassword')->name('forgot_password');
Route::post('/forgot_password_set_link',[ForgotPassword::class,'ForgotPassword'])->name('forgot_password_set_link');
route::get('/reset_password/{token}',[ForgotPassword::class,'reset_password'])->name('reset_password');
Route::Post('/new_password',[ForgotPassword::class,'new_password'])->name('new_password');

