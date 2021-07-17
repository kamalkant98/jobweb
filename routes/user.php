<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\changepassword;



Route::group (['middleware'=>'auth'],function(){
  
  Route::get( '/download/resume/{filename}',[webController::class,'resume_download'])->name('resume_download');
  Route::get('/download/resume_cepture_image/{filename}',[webController::class,'resume_cepture_image'])->name('resume_cepture_image');
  Route::get('/download/salary_slip/{filename}',[webController::class,'salary_slip'])->name('salary_slip');

  Route::post ('notificaton_read/{id}',function($id){
    $notification = auth()->user()->notifications()->where('id', $id)->first();
    $notification->markAsRead();
  });

   //change passowrd
   Route::post('changepassword',[changepassword::class,'change_password'])->name('change_password');

  

});
Route::group(['middleware'=>['auth','authemploye']], function () { 
    //profile
    Route::get('/profile',[webController::class,'user_profile'])->name('user_profile');
    Route::post('/profile/edit/{user_id}',[webController::class,'profile_edit'])->name('profile_edit');
   //profile resume 

    Route::get('/profile/resume/{id}',[webController::class,'profile_resume'])->name('profile_resume');

    // resume educayion

    Route::post('profile/education',[webController::class,'add_education'])->name('add_education');
    Route::get('education/delete/{id}',[webController::class,'delete_education'])->name('delete_education');
    Route::post('profile/education/update/{id}',[webController::class,'update_education'])->name('update_education');

    // resume experience
    
    Route::post('profile/experience',[webController::class,'add_experience'])->name('add_experience');
    Route::post('profile/experience/update/{id}',[webController::class,'update_experience'])->name('update_experience');
    Route::get('experience/delete/{id}',[webController::class,'delete_experience'])->name('delete_experience');

    // resume certifications&license

    Route::post('profile/certifications',[webController::class,'add_certifications'])->name('add_certifications');
    Route::post('profile/certifications/update/{id}',[webController::class,'update_certifications'])->name('update_certifications');
    Route::get('certifications/delete/{id}',[webController::class,'delete_certifications'])->name('delete_certifications');

    //resume additional_information

    Route::post('profile/additional_information',[webController::class,'add_additional_information'])->name('add_additional_information');
    Route::post('profile/additional_information/update/{id}',[webController::class,'update_additional_information'])->name('update_additional_information');
    Route::get('informations/delete/{id}',[webController::class,'delete_informations'])->name('delete_informations');

    //resume language

    Route::post('profile/language',[webController::class,'add_language'])->name('add_language');
    Route::post('profile/language/update/{id}',[webController::class,'update_language'])->name('update_language');
    Route::get('language/delete/{id}',[webController::class,'delete_language'])->name('delete_language');

    //resume skills

    Route::post('profile/skill',[webController::class,'add_skill'])->name('add_skill');
    Route::post('profile/skill/update/{id}',[webController::class,'update_skill'])->name('update_skill');
    Route::get('skill/delete/{id}',[webController::class,'delete_skill'])->name('delete_skill');


   // Subscription_plan

   Route::get('profile/Subscription_plan/{id}',[webController::class,'Subscription_plan'])->name('Subscription_plan');
    Route::get('/select_plan/{id}',[webController::class,'select_plan'])->name('select_plan');
   Route::post('/pay',[webController::class,'pay'])->name('pay');

   //applied_jobs

   Route::get('/profile/applied_jobs',[webController::class,'applied_jobs'])->name('applied_jobs');

  //apply jobs

    Route::get('/apply_for_job/{id}',[webController::class,'apply_for_job'])->name('apply_for_job');

   //interview_schedules 
   Route::get('profile/interview_schedules',[webController::class,'interview_schedules'])->name('interview_schedules');

   Route::get('notification',[webController::class,'user_notification'])->name('user_notification');
   
    Route::view('profile/change_password','web.pages.change_password')->name('user_change_password');

});


Route::group(['prefix' => 'employer','middleware'=>['auth','authemployer']], function () {

      Route::get('/',[webController::class,'employer_home'])->name('employer_home');
      Route::get('/all_job',[webController::class,'employer_all_job'])->name('employer_all_job');
      Route::get('/job_list',[webController::class,'job_list'])->name('employer_job_list');
      Route::get('/add_job',[webController::class,'add_job'])->name('employer_add_job');
      Route::post('/create_job',[webController::class,'create_job'])->name('employer_create_job');
      Route::get('/job/edit/{id}',[webController::class,'job_edit'])->name('employer_job_edit');

      //applicants

      Route::get('applicants/{id}',[webController::class,'applicants'])->name('applicants');
      Route::get('applicant/details/{id}',[webController::class,'applicant_details'])->name('applicant_details');

      //employer/all_applicants

      Route::get('/all_applicants',[webController::class,'all_applicants'])->name('all_applicants');

      Route::any('actively_update/{job_id}/{user_id}/{data}',[webController::class,'actively_update'])->name('actively_update');
      
      Route::get('notification',[webController::class,'notification'])->name('notification');

      Route::get('profile',[webController::class,'employer_profile'])->name('employer_profile');

      Route::post('update_profile',[webController::class,'update_profile'])->name('update_profile');

});
