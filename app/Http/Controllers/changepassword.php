<?php

namespace App\Http\Controllers;
use App\Rules\checkpassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class changepassword extends Controller
{
    public function change_password(Request $request){
        $validator =   Validator::make($request->all(), [
            'oldpassword' => ['required', 'min:6', new checkpassword],
            'password' => ['required', 'min:6', 'confirmed', 'different:oldpassword'],
            'password_confirmation' => ['required', 'min:6'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withinput();
          }else {
            auth()->user()->update(['password' => Hash::make($request->get('password'))]);

            return back()->with('success','Password has been Updated successfully.');
          }
    }
}
