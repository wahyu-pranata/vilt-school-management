<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return inertia('Register', [
            'image' => asset('/images/register-kid.jpg')
        ]);
    }
    public function store(Request $request) {
        $user = new User;
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|alpha|max:255',
            'password' => 'required|min:8|confirmed'
        ]);
        $user->email = $validatedData['email'];
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->password = $validatedData['password'];

        $user->save();
        return redirect()->route('login.index')->with('message', 'Your account successfully created!');
    }
}
