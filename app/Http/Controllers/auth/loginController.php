<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Auth;

class loginController extends Controller
{
    public function login(Request $request){
        $validator =   Validator::make($request->all(), [
            'login'   => 'required',
            'password' => 'required|min:6'
            ],[
                'login.required'=>'The email / username  field is required.',
        ]);
            if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)->withInput(); //Sends back only room name
            }else {
                $login=$request->login;
                $password=$request->password;
            
                    if(filter_var($login, FILTER_VALIDATE_EMAIL)) {
                    
                        Auth::attempt(['email' => $login, 'password' => $password]);
                    } else {
                    
                        Auth::attempt(['mobile' => $login, 'password' => $password]);
                    }
            
                
                    if ( Auth::check() ) {
                        $user = Auth::User();
                        if(!empty($user)){
                            Session::put('user', $user); 
                            if(auth()->user()->usertype == '0'){
                                return redirect('/admin');
                            }else if(auth()->user()->usertype == '1'){
                                return redirect('/employer');
                            }else{
                                return redirect('/home');
                            }
                     
                        }
                     }else{
                        return back()->withErrors([
                         'login' => 'Please, check your email and mobile',
                         'password' => 'Please, check your password' 
                        ])->withInput() ;
                     }
            }     
    }

    public function logout(Request $request ) {
        $request->session()->flush();
        Auth::logout();
       
        return redirect('login');
    }
}
