<?php

namespace App\Http\Controllers\Admin;

use App\Mail\Cheque;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PayrollController extends Controller
{

     public function __construct(){
        $this->middleware('auth:admin');
    }

    
    public function index(){

        
        //  users information
       $users = DB::table('users')
            ->leftJoin('details', 'users.id', '=', 'details.user_id')
            ->select('users.id','users.position','users.fullName','users.employeeId','users.salary','details.phone','details.city','details.country','details.created_at')
            ->latest()
            ->get();


        return view('admin.payroll', ['users' => $users]);
    }

     public function edit($id){
          $result = User::get()->first(); 

         $user= $result->findOrFail($id);

         return view('admin.payment', ['user' => $user]);
     }

    //  send user email
    public function send($id){
        // find the user
        $user = User::where('id', $id)->get()->first();

        //send email to the user
        Mail::to($user->email)->send(new Cheque($user));

        // redirect with a message
        return redirect()->back()->with('status', 'Salary breakdown sent successfully!');

    }


         //update user details
    public function update(Request $request, $id)
    {
         $result = User::get()->first(); 

         $user= $result->findOrFail($id);

         $request->validate([
            'salary' => 'required|numeric'
        ]);


        $user->update([
            'salary' => $request->salary,
        ]);


        return redirect()->back()->with('status', 'Payment information updated successfully!');
        
    }
}
