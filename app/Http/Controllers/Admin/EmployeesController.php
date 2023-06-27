<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    
     public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        
        // get employees
        $users = DB::table('users')
        ->latest()
        ->get();       
        ;
       
        return view('admin.employees', ['users'=> $users]);
    }
      
    // Add employee
     public function manage(){
        return view('admin.create');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating request
          $formFields = $request->validate([
            'fullName' => 'required|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'position' => 'required',
            'salary' => 'required|numeric',
            'password' => 'required|confirmed|min:8'
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);
       
         $employeeId = 'LA'. + rand(1000, 9999);

         $formFields['employeeId'] =   $employeeId;

        $user = User::Create($formFields);

        return redirect()->back()->with('status', 'Employee account created successfully!');
    }

     //delete the employee
    public function destroy($id)
    {
      $user = User::where('id', $id)->get()->first();
      
      $user->delete();

      $user->leaves()->delete();
      
      return redirect()->route('employees');
    }
}
