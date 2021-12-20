<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class RegistrationController extends Controller
{
    //THIS WILL SHOW THE FORM
      public function RegisterUser(){
        return view("specs-blog.register");
    }
    
       // public function PostRegisterUser(){
           // $this->validate(request(), [
            // 'name' => 'required',
            // 'email' => 'required|email',
            // 'password' => 'required'
        // ]);
        
        // $user = User::create(request(['name', 'email', 'password']));
        
        // auth()->login($user);
        
        // return redirect()->to('/home');
    // }
    
   public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        Session::flash('message', 'Great Your account was created !');
        return redirect("bloghome");
    }

 public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    
    
}
