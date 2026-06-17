<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //show signup form
    public function signupForm(){
        return view('auth.signup');
    }

    //handle signup
    public function signup(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'role' => 'required|in:seller,customer',
        ]);

        $exists = User::where('name', $request->name)->where('role', $request->role)->exists();
        
        if($exists){
            return back()->withErrors([
                'name' => 'A'.$request->role.' with that name already exists.',
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'balance' => 0.00,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    //show signin form
    public function signinForm(){
        return view('auth.signin');
    }

    //handle signin
    public function signin(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'name' => 'Wrong name or password.',
        ]);
    }

    //logout
    public function logout(){
        Auth::logout();
        return redirect('/signin');
    }
}
