<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function index($id){
        $vacancy = Vacancy::get()->first();

        $result= $vacancy->find($id); 
        
        

           return view('apply', ['result' => $result]);
    }



    public function store(Request $request, $id){

         $vacancy = Vacancy::get()->first(); 

         $result= $vacancy->find($id); 
        
          // validating request
          $formFields = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email:strict,dns',
            'phone' => 'required|numeric',
            'cover' => 'required',
            'attachment' => 'required'
        ]);

        if ($request->hasFile('attachment')) {
            $formFields['attachment'] = $request->file('attachment')->store('logos', 'public');
        }

        $formFields['vacancy_id'] = $result->id;

        // dd($formFields);


       $place = Application::Create($formFields);


        return redirect()->back()->with('status', 'Job applied successfully!');

    }


}
