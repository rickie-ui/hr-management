<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        
        // get users
        $users = DB::table('users')
            ->latest()
            ->get();       
        ;

        $applications = DB::table('applications')
            ->join('vacancies', 'vacancies.id', '=', 'applications.vacancy_id')
            ->select('vacancies.title','applications.email','applications.status','applications.created_at')
            ->latest()
            ->get();

            $userCount = User::count();
            $total = $users->sum('salary');
            $average = $users->avg('salary');
            $appCount = Application::count();


        return view('admin.dashboard', ['users' => $users, 
                'applications' => $applications,
                'userCount' => $userCount,
                'total' => $total,
                'average' => $average,
                'appCount' => $appCount
       ]);
    }

   

}
