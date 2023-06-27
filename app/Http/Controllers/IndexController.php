<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('index');
    }
}
