<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserDashController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    // get the login form
    public function index(){

        $user_id = auth()->id();
          // get users
        $dayoffs = DB::table('leaves')
            ->latest()
            ->where('user_id', '=', $user_id)
            ->get();       
        ;


        return view('users.userdashboard', ['dayoffs' => $dayoffs]);


    }
}
