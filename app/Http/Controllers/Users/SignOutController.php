<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignOutController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

     // logout button
     public function signout(Request $request)
    {

          auth()->logout();

        return redirect()->route('signin');
        
    
    }
}
