<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // dd($validatedData);
    $user = new User();
    $user->name     = $validatedData['name'];
    $user->email    = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']);
    $user->role     = $validatedData['role']; 
    
    $user->save();
    Auth::login($user);
    return redirect()->route('dashboard');
}

    public function userLogout(){
        Auth::logout();

        return redirect()->route('user.login.view');
    }

}
