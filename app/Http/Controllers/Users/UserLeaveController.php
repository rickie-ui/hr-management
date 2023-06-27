<?php

namespace App\Http\Controllers\Users;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserLeaveController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        return view('users.dayoff');

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
            'leave' => 'required',
            'from' => 'required',
            'end' => 'required',
            'reason' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        // check if the user has an existing leave with status of 1
        $existingLeave = Leave::where('user_id', auth()->id())
                            ->where('status', 1)
                            ->first();

        if ($existingLeave) {
             return redirect()->back()->with('status', 'You have an existing pending leave request!');
        }

        // check if there is an existing leave request with status of 2
         // check if there is an existing leave request with status 2 and the current date is between the dates in columns from and end
        $currentDate = now()->format('Y-m-d');
        $existingApprovedLeave = Leave::where('user_id', auth()->id())
                                    ->where('status', 2)
                                    ->where('from', '>=', $currentDate)
                                    ->where('end', '<=', $currentDate)
                                    ->orWhere('status', 2)
                                    ->first();

        if ($existingApprovedLeave) {
             return redirect()->back()->with('status', 'You already have an approved leave request!');
        }

        Leave::create($formFields);

        return redirect()->back()->with('status', 'Your leave request has been submitted!');
    }

}
