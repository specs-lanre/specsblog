<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    //
    
    public function ShowLoginform(){
        return view("specs-blog.loginuser");
    }
    
    public function LoginUser(Request $request){
         $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Session::flash('message', 'Great you are logged in!'); 
            Session::flash('alert-class', 'alert-danger');        
            return redirect('bloghome');
                           }
  
        Session::flash('message', 'Invalid login details  !'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect("loginuser");
    }
      
    
    
    
     public function SignOut() {
        Session::flush();
        Auth::logout();
        
        Session::flash('message', 'You logged out  !');
        return Redirect('loginuser');
    }
    
    
    
    
    
    
    
    
}
