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
    
       public function LoginUser(Request $request){
         $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');       }
  
        return redirect("loginuser")->withSuccess('Login details are not valid');
    }
    
       
    
    
    
     public function SignOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('loginuser');
    }
    
    
    
    
    
    
    
    
}
