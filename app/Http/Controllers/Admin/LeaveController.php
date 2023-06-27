<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Leave;
use App\Mail\UserLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
      public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index(){

           $dayoffs = DB::table('leaves')
            ->leftJoin('users', 'users.id', '=', 'leaves.user_id')
            ->select('users.id','users.fullName','users.employeeId','leaves.leave','leaves.from','leaves.end','leaves.reason','leaves.status','leaves.created_at', 'leaves.id')
            ->latest()
            ->get();


        return view('admin.leave', ['dayoffs' => $dayoffs]);
    }


      public function update($id)
          {
      
              $result = Leave::get()->first(); 

              $leave= $result->find($id);

              $leave->status = 2;

              $leave->update();

              $user = User::where('id', $leave->user_id)->first();

              Mail::to($user->email)->send(new UserLeave($user));

              return redirect()->route('dashboard');
          }

     public function reject($id)
    {
         $result = Leave::get()->first(); 

         $leave= $result->find($id);

        $leave->status = 3;
        $leave->update();

        return redirect()->route('dashboard');
    }
}
