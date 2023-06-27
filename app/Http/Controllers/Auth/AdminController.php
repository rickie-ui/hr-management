<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


class AdminController extends Controller
{

   
    // // middleware and guard
    public function __construct(){
        $this->middleware('guest:admin');
    }

    // get the registration form
    public function index(){
        return view('auth.register');
    }
 
    // get the login form
    public function login(){
        return view('auth.login');
    }

       // get the reset form
    public function reset(){
        return view('auth.reset');
    }

       // get the update form
    public function update($token){
        return view('auth.update',  ['token' => $token]);
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
            'email' => ['required', 'email:strict,dns', Rule::unique('admins', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);
       
         $employeeId = 'LA'. + rand(1000, 9999);

         $formFields['employeeId'] =   $employeeId;

        $admin = Admin::Create($formFields);

        Auth::guard('admin')->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }

    

    /**
     * Login using existing data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required'
              ]);

             if (!Auth::guard('admin')->attempt($request->only('email','password'))) {
              return back()->with('status', 'Invalid credentials');
             }

              return redirect()->route('dashboard');;
    }

       /**
     * send email using existing data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
              ]);

             $status = Password::sendResetLink(
                $request->only('email')
             );

              return $status == Password::RESET_LINK_SENT
                             ? back()->with('status', __($status))
                             : back()->withInput($request->only('email'))
                                     ->withErrors(['email' => __($status)]);
    }

       /**
     * update password using existing data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
              ]);

              $status = Password::reset(
                    $request->only('email', 'password', 'password_confirmation', 'token'),
                        function ($user, $password) {
                        $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
        
                    $user->save();
        
                    event(new PasswordReset($user));
                }
              );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);

            
    }
}
