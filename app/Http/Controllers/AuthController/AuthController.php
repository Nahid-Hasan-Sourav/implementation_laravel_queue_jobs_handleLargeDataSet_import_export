<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function userLogin(){
        return view('auth.login');
    }
}
