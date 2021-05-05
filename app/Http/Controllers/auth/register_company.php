<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\usermeta;
use App\Notifications\noti_newuser;
use Notification;


class register_company extends Controller
{
    public function employer_create(Request $request){
     

        $validator =   Validator::make($request->all(), [
            'employer_name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
            'employer_mobile' => ['required','min:11','numeric'],
            'empolyer_password' => ['required','min:6'],
            'employer_website' => ['required','string'],
            'employee_working' => ['required','string'],
            'salary_day' => ['required','numeric'],
            'employer_level' => ['required','numeric'],
            'contact_person_name' => ['required','string'],
            'State' => ['required','string'],
            'contact_person_designation' => ['required','string'],
            'City' => ['required','string'],
            'contact_person_email' => ['required', 'string', 'email', 'max:255','unique:users,person_email'],
            'contact_person_mobile' => ['required','string'],
            'address'=>['required','required'],
            'description'=>['required'],
            'cover_image' => ['image','mimes:jpeg,png,jpg'],
            'profile_image' => ['image','mimes:jpeg,png,jpg'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withinput();
        }else {
                  $employer= new User;
                  $employer->name=$request->employer_name;
                  $employer->email=$request->email;
                  $employer->person_email=$request->contact_person_email;
                  $employer->password=hash::make($request->empolyer_password);
                  $employer->website=$request->employer_website;
                  $employer->employee_working=$request->employee_working;
                  $employer->salary_day=$request->salary_day;
                  $employer->employer_level= $request->employer_level;
                  $employer->person_name=$request->contact_person_name;
                  $employer->state=$request->State;
                  $employer->city=$request->City;
                  $employer->person_designation=$request->contact_person_designation;
                  $employer->description=$request->description;
                  $employer->status='1';
                  $employer->address=$request->address;
                  $employer->mobile=$request->employer_mobile;
                  $employer->person_mobile=$request->contact_person_mobile;
                  $employer->usertype='1';
                  if($request->hasfile('profile_image')){
                      $path=public_path('assest/web/assest/images/profile_image');
                      $filename= Str::random(7).time().'.'.$request->file('profile_image')->Extension();
                      $image= $request->file('profile_image')->move($path,$filename);
                      $employer->profile_image=$filename ;
                  }
                  if($request->hasfile('cover_image')){
                      $path=public_path('assest/web/assest/images/cover_image');
                      $filename= Str::random(7).time().'.'.$request->file('cover_image')->Extension();
                      $image= $request->file('cover_image')->move($path,$filename);
                      $employer->cover_image=$filename ;
                  }
                  if($employer->save()){
                    $admin= User::where('usertype','0')->first();
                    $admin->notify(new noti_newuser($employer));
                    return redirect('login')->with('success','Your Register Has Been Successfully.');
                  }else{
                    return back()->with('error','Somthing Went Gone Worng.');
                  }
  
  
        }
    }
}
