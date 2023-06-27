<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
     // middleware and guard
     public function __construct(){
        $this->middleware('auth:admin');
    }


     public function index($id){

         $result = User::get()->first(); 

         $user= $result->findOrFail($id);

        return view('admin.detail', ['user' => $user]);
    }


      //update user details
    public function update(Request $request, $id)
    {
         $result = User::get()->first(); 

         $user= $result->findOrFail($id);

         $request->validate([
            'fullName' => 'required',
            'email' => 'required', 'email',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required|numeric'
        ]);


        $user->update([
            'fullName' => $request->fullName,
            'email' => $request->email,
        ]);

        


       $user->detail()->updateorCreate(
        [
            'user_id' => $user->id, 
        ],
        
        [
            'city' => $request->city,
            'country' => $request->country,
            'position' => $request->position,
            'phone' => $request->phone,
        ]);


        return redirect()->back()->with('status', 'Employee information updated successfully!');
        
    }
}
