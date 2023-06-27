<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{

     public function __construct(){
        $this->middleware('auth:admin');
    }

     // logout button
     public function signout(Request $request)
    {

          auth()->logout();

        return redirect()->route('login');
        
    
    }
}
