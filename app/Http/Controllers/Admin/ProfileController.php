<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
      public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index($id){

         $result = Admin::get()->first(); 

         $admin= $result->find($id);

        return view('admin.profile', ['admin' => $admin]);
    }


     //update user details
    public function update(Request $request, $id)
    {
         $result = Admin::get()->first(); 

         $admin= $result->find($id);

         $request->validate([
            'fullName' => ['required'],
            'email' => ['required', 'email'],
            'city' => ['required'],
            'country' => ['required'],
            'address' => ['required'],
            'phone' => 'required|numeric'
        ]);


        $admin->update([
            'fullName' => $request->fullName,
            'email' => $request->email,
        ]);

        


       $admin->profile()->updateorCreate(
        [
            'admin_id' => $admin->id, 
        ],
        
        [
            'city' => $request->city,
            'country' => $request->country,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);


        return redirect()->back()->with('status', 'Information updated successfully!');
        
    }
}
