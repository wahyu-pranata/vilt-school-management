<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return inertia('Login', [
            'image' => asset('images/login-kid.jpg')
        ]);
    }
}
