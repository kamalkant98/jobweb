<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;


Route::post('city/{id}',[adminController::class,'city'])->name('city');

Route::post('/job_category/{id}',[adminController::class,'job_category'])->name('job_category');

Route::group(['prefix' => 'admin','middleware'=>['auth','authadmin']], function () {

    Route::get('/profile',[adminController::class,'profile'])->name('profile');
    Route::post('update_profile',[adminController::class,'update_profile'])->name('update_profile');
    
    Route::get('/',[adminController::class,'index'])->name('admin');
    Route::post('city/{id}',[adminController::class,'city'])->name('city');
    //employer
    Route::get('/employer',[adminController::class,'employer']);
    Route::get('/employerlist',[adminController::class,'employerlist'])->name('employerlist');
    Route::get('/employer/edit/{id}',[adminController::class,'employer_edit'])->name('employer_edit');
    Route::post('/update_employer',[adminController::class,'update_employer'])->name('update_employer');
    Route::get ('employer/delete/{id}',[adminController::class,'employer_delete'])->name('employer_delete');
    Route::get('/add_employer',[adminController::class,'add_employer'])->name('add_employer');
    Route::post('/create_employer',[adminController::class,'create_employer'])->name('create_employer');

    //permissions
    Route::get('employee_permissions/{id}',[adminController::class,'employer_permissions'])->name('employee_permissions');
    Route::get('employer_permissions/{id}',[adminController::class,'employer_permissions'])->name('employer_permissions');
    Route::post('add_employer_permission',[adminController::class,'add_employer_permission'])->name('add_employer_permission');
  
    //employe
    Route::get('/employe',[adminController::class,'employe'])->name('employe');
    Route::get('/employelist',[adminController::class,'employelist'])->name('employelist');
    Route::get('/employe/edit/{id}',[adminController::class,'employe_edit'])->name('employe_edit');
    Route::post('/update_employe',[adminController::class,'update_employe'])->name('update_employe');
    Route::get('add_employee',[adminController::class,'add_employee'])->name('add_employee');
    Route::post('/create_employee',[adminController::class,'create_employee'])->name('create_employee');
    Route::get ('employee/delete/{id}',[adminController::class,'employee_delete'])->name('employee_delete');

    //category
    Route::get('/main_category',[adminController::class,'main_category'])->name('main_category');
    Route::get('/add_category',[adminController::class,'add_category'])->name('add_category');
    Route::post ('/create_category',[adminController::class,'create_category'])->name('create_category');
    Route::get('/main_category/subcategory/{id}',[adminController::class,'subcategory'])->name('subcategory');
    Route::get('category/edit/{id}',[adminController::class,'edit_maincategory'])->name('edit_maincategory');
    Route::get('category/delete/{id}',[adminController::class,'category_delete'])->name('category_delete');
    Route::post('update_category',[adminController::class,'update_category'])->name('update_category');
    Route::post('update_subcategory',[adminController::class,'update_subcategory'])->name('update_subcategory');

    ///job####

    Route::get('add_job',[adminController::class,'add_job'])->name('add_job');
    Route::post('/create_job',[adminController::class,'create_job'])->name('create_job');
    Route::get('/all_job',[adminController::class,'all_job'])->name('all_job');
    Route::get('/job_list',[adminController::class,'job_list'])->name('job_list');
    Route::get('/job/edit/{id}',[adminController::class,'job_edit'])->name('job_edit');
    Route::get('/job/delete/{id}',[adminController::class,'job_delete'])->name('job_delete');
   
   
    //qualification
    Route::get('/qualification',[adminController::class,'qualification'])->name('qualification');
    Route::post('/create_qualification',[adminController::class,'create_qualification'])->name('create_qualification');
    Route::get('/qualification_list',[adminController::class,'qualification_list'])->name('qualification_list');
    Route::get('qualification/edit/{id}',[adminController::class,'qualification_edit'])->name('qualification_edit');
    Route::get('qualification/delete/{id}',[adminController::class,'qualification_delete'])->name('qualification_delete');

    //subscription
    Route::get('/subscription',[adminController::class,'subscription'])->name('subscription');
    Route::get('/add_subscription',[adminController::class,'add_subscription'])->name('add_subscription');
    Route::post('create_subscription',[adminController::class,'create_subscription'])->name('create_subscription');
    Route::get('/subscription_list',[adminController::class,'subscription_list'])->name('subscription_list');
    Route::get('subscription/edit/{id}',[adminController::class,'edit_subscription'])->name('edit_subscription');
    Route::post('subscription/update',[adminController::class,'update_subscription'])->name('update_subscription');
    Route::get('subscription/delete/{id}',[adminController::class,'delete_subscription'])->name('delete_subscription');


   
    Route::get('/notification',[adminController::class,'notification'])->name('notification');
});

