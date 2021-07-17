<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgotPassword extends Controller
{
    public function ForgotPassword(Request $request){
    
        $validator =   Validator::make($request->all(), [
          'email' => ['required', 'string', 'email', 'max:255','exists:users']
          
        ],[
          'email.exists' => 'your email dosnot existe! ',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withinput();
        }else {
            
            $token = Str::random(100);
            $data = User::where ('email',$request->email)->first();
        
            $data->reset_password_token= $token;
            if($data->save()){
              /*   Mail::send('mail.forgotpassword',['kamal'=>$data],function($message){
                    $message->to($data['email'])
                    ->subject('forgot password ');
                }); */
                $to_name = $data->name;
                $to_email = $data->email;
                Mail::send('mail.forgotpassword', ['kamal'=>$data], function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                    ->subject('Reset password');

                    });


                return back()->with('success','Plese check you email link has been sed successfully .');

            }
        }
    }

    public function reset_password($token){
        $data = User::where('reset_password_token',$token)->first();

        if(!empty($data)){
                return view('auth.passwords.new_password',['userid'=>$data->id]);
        }else{
           return redirect ('forgot_password')->with('info','Link Expire please try again.'); 
        }
    }

    public function new_password(Request $request){
        $validator =   Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $data= User::where('id',$request->userid)->update(['password' => Hash::make($request->get('password'))]);
            return redirect('login')->with('success','Password has been Updated successfully.');
        }

    }
}
