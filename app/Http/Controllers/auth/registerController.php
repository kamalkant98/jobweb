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


class registerController extends Controller
{
    public function user_register(Request $request){
    
        $validator =   Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'mobile' => ['required', 'min:10','numeric'],
            'current_salary'=>['required'],
            'state'=> ['required'],
            'city'=>['required'],
            'industry' =>['required'],
            'job_category' =>['required'],
            'expected_salary' =>['required'],
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }else {
           $user= new User;
           $user->name=$request->name;
           $user->email=$request->email;
           $user->password=hash::make($request->password);
           $user->mobile=$request->mobile;
           $user->state=$request->state;
           $user->city=$request->city;
           $user->usertype='2';
           $user->status='1';

           


           if($user->save()){
                $data= [
                    'current_salary'=> $request->current_salary,
                    'industry'=>$request->industry,
                    'job_category'=>$request->job_category,
                    'expected_salary' =>$request->expected_salary,
                ];

                usermeta::updateOrNew($user->id,$data);
           
                cache()->forget('user.' . $user->id . '.metas.pluck.value');
                cache()->forget('user.' . $user->id . '.meta');
                foreach ($data as $key => $value) {
                    cache()->forget('user.' . $user->id . '.meta.' . $key);
                }
                $admin= User::where('usertype','0')->first();
                $admin->notify(new noti_newuser($user));
          /*  Notification::send($admin, new noti_newuser($user)); */
               return redirect('login')->with('success','Your Register Has Been Successfully.');
           }else{
            return back()->with('error','Somthing Went Gone Worng.');
           }
        }
    }
}
