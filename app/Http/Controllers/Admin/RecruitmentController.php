<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RecruitmentController extends Controller
{
     public function __construct(){
        $this->middleware('auth:admin');
    }

    
    public function index(){

         //  users information
       $applications = DB::table('applications')
            ->leftJoin('vacancies', 'vacancies.id', '=', 'applications.vacancy_id')
            ->select('applications.id','applications.first_name','applications.last_name','applications.phone','applications.email','vacancies.title','applications.status','applications.created_at')
            ->latest()
            ->get();
        return view('admin.recruitment', ['applications' => $applications]);
    }


     public function update($id)
    {
         $result = Application::get()->first(); 

         $application= $result->find($id);

        $application->status = 2;
        $application->update();

        return redirect()->route('dashboard');
    }

     public function reject($id)
    {
         $result = Application::get()->first(); 

         $application= $result->find($id);

        $application->status = 3;
        $application->update();

        return redirect()->route('dashboard');
    }

   
}
