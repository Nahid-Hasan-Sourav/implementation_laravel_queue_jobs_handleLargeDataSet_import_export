<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function userLoginView()
    {
        return view('auth.login');
    }

    public function userCreate(UserRegisterValidation $request)
        {
    $validatedData = $request->validated();
    $user = new User();
    $user->name     = $validatedData['name'];
    $user->email    = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']);
    $user->role     = $validatedData['role']; 
    
    $user->save();
    Auth::login($user);
    return redirect()->route('dashboard');
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
  
            return redirect()->route('dashboard');
        }

     
        $user = User::where('email', $request->email)->first();

        if (!$user) {
 
            return redirect()->route('user.login.view')->with('error', 'Email not found');
        }

        if (!Hash::check($request->password, $user->password)) {
  
            return redirect()->route('user.login.view')->with('error', 'Invalid password');
        }
        
      
        return redirect()->route('user.login.view')->with('error', 'Invalid login credentials');
    }


    public function userLogout(){
        Auth::logout();

        return redirect()->route('user.login.view');
    }

}
