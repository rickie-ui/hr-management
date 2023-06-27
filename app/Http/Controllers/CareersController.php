<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CareersController extends Controller
{
    public function index(){
         $vacancies = DB::table('vacancies')
            ->latest()
            ->get();       
        ;
        return view('careers', ['vacancies' => $vacancies]);
    }
}
