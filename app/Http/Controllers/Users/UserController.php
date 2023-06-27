<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{

     public function __construct(){
        $this->middleware('guest');
    }
 
    // get the login form
    public function login(){
        return view('users.signin');
    }

    /**
     * Login using existing data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required'
              ]);

             if (!auth()->attempt($request->only('email','password'))) {
              return back()->with('status', 'Invalid credentials');
             }

              return redirect()->route('userDash');
    }
 
  
}
