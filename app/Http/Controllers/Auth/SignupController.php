<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class SignupController extends Controller
{
    public function SignupForm(){
        return view('auth.signup');
    }
    public function Signup(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email','max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);


        return redirect(route('home'))->with('success', 'Signup Successful');
    }
}
