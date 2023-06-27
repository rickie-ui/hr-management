<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\PayrollController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Users\SignOutController;
use App\Http\Controllers\Users\UserDashController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Users\UserLeaveController;
use App\Http\Controllers\Admin\RecruitmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home page
Route::get('/', [IndexController::class, 'index'])->name('index');


// careers page
Route::get('/careers', [CareersController::class, 'index'])->name('careers');

//Blogs page
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

// contact form
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact', 'store');
});

// application page
Route::controller(ApplyController::class)->group(function () {
    Route::get('/careers/{app}/apply', 'index')->name('apply');
    Route::post('/careers/{app}/apply', 'store');
});


//Employee pages and dashboard
Route::prefix('users')->group(function(){

        Route::get('/login', [UserController::class, 'login'])->name('signin');
        Route::post('/login', [UserController::class, 'signin']);

        Route::get('/dashboard', [UserDashController::class, 'index'])->name('userDash');

        Route::get('/leave', [UserLeaveController::class, 'index'])->name('dayoff');
        Route::post('/leave', [UserLeaveController::class, 'store']);

});

Route::post('/signout', [SignOutController::class, 'signout'])->name('signout');

// Admin pages
Route::prefix('admin')->group(function(){
           
        // route group with same controller
        Route::controller(AdminController::class)->group(function () {
                
                Route::get('/register', 'index')->name('register');
                Route::post('/register', 'store');

                Route::get('/login', 'login')->name('login');
                Route::post('/login', 'signin');

                Route::get('/reset',  'reset')->name('reset');
                Route::post('/reset', 'send');

                Route::get('/update/{token}', 'update')->name('update');
                Route::post('/update/{token}', 'create');
                
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');

        Route::get('/{user}/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/{user}/profile', [ProfileController::class, 'update']);

        Route::get('/employees/create', [EmployeesController::class, 'manage'])->name('create');
        Route::post('/employees/create', [EmployeesController::class, 'store']);
        
        Route::delete('/{user}/delete', [EmployeesController::class, 'destroy']);

        Route::get('/{user}/detail', [DetailController::class, 'index'])->name('detail');
        Route::put('/{user}/detail', [DetailController::class, 'update']);


        Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll');

        Route::post('/cheque/{id}', [PayrollController::class, 'send'])->name('cheque');


        Route::get('/{user}/payroll', [PayrollController::class, 'edit'])->name('payment');
        Route::put('/{user}/payroll', [PayrollController::class, 'update']);

        Route::get('/recruitment/vacancy', [VacancyController::class, 'index'])->name('vacancy');
        Route::post('/recruitment/vacancy', [VacancyController::class, 'store']);


         Route::controller(LeaveController::class)->group(function () {
                Route::get('/leave', 'index')->name('leave');
                Route::get('/leave{update}', 'update')->name('accept');
                Route::get('/deny/{leave}', 'reject')->name('denied');
        });

        Route::controller(RecruitmentController::class)->group(function () {
                Route::get('/recruitment', 'index')->name('recruitment');
                Route::get('/recruitment/{update}', 'update')->name('change');
                Route::get('/recruit/{reject}', 'reject')->name('reject');
        });
        
        

});

Route::post('/logout', [LogoutController::class, 'signout'])->name('logout');