<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return inertia('Register', [
            'image' => asset('/images/register-kid.jpg')
        ]);
    }
}
