<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ForgetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{


       public function index(){
         return view('layouts.Login');
       }
    
        public function store(Request $request)
        {
            $remember = !empty($request->remember) ? true:false;
    
           if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
    
             if(Auth::user()->user_type == 1){
                return redirect()->route('admin')->with('success','Admin Login has been successful');
             }
    
             else if(Auth::user()->user_type == 2){
                return redirect()->route('school')->with('success','School Login has been successful');
             }
    
             else if(Auth::user()->user_type == 3){
                return redirect()->route('teacher')->with('success','Teacher Login has been successful');
             }
             else if(Auth::user()->user_type == 4){
                return redirect()->route('parent')->with('success','ParentLogin has been successful');
             }
    
             else if(Auth::user()->user_type == 5){
                return redirect()->route('student')->with('success','Student Login has been successful');
             }
    
           }else{
            return redirect()->back()->with('errors','Please Enter current Email or Password');
           }
        }
    
    
        public function forgetPassword_store(Request $request)
        {
            $user = User::getEmailSingle($request->email);
            if(!empty($user)){
              $user->remember_token = Str::random(30);
              $user->save();
              Mail::to($user->email)->send(new ForgetPassword($user));
              return redirect()->back()->with('success','Please check your email and reset your password');
            }else{
              return redirect()->back()->with('errors','Email dose not found');
            }
        }
    
        public function forgetPassword()
        {
            return view('layouts.password');
        }


        public function forgetPassword_reset($remember_token)
        {
            $user = User::getEmailToken($remember_token);
            if(!empty($user)){
              $data['user'] = $user;
              return view('layouts.reset',['data'=>$data]); 
            }else{
                abort(404);
            }
            
             
    
        }
    
        public function changePassword($token, Request $request){
           if($request->password == $request->cpassword){
            $user = User::getEmailToken($token);
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect()->route('login')->with('success','password change successful');
           }else{
            return redirect()->back()->with('errors','Password and confirm password dose not mach');
           }
        }
        public function logout()
        {
            Auth::logout();
            return redirect()->route('login')->with('success','Log out has been successful');
        }
}
