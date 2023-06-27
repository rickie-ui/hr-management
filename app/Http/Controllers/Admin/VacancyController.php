<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VacancyController extends Controller
{

     public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index(){
        return view('admin.vacancy');
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
            'title' => 'required|max:255',
            'city' => 'required',
            'state' => 'required',
            'salary' => 'required',
            'description' => 'required'
        ]);


       Vacancy::Create($formFields);

        return redirect()->back()->with('status', 'Job opening posted successfully!');
    }
}
