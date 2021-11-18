<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
   if (Auth::check()) {
        return redirect('/dashboard');
   }else{
        return redirect('/login');
   }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    switch (auth()->user()->role) {
        case 'admin':
            return redirect()->route('admin.home');
            break;
        case 'employee':
            return redirect()->route('employee.home');
            break;
     
    }

})->name('dashboard');







// admin routes

Route::middleware(['auth:sanctum', 'verified','admin'])->group(function () {
    Route::get('/admin/home', function () {
        return view('pages.admin.home');
    })->name('admin.home');

    Route::get('/admin/users', function () {
        return view('pages.admin.users');
    })->name('admin.users');

    Route::get('/admin/employees', function () {
        return view('pages.admin.employees');
    })->name('admin.employees');

    Route::get('/admin/departments', function () {
        return view('pages.admin.departments');
    })->name('admin.departments');

    Route::get('/admin/positions', function () {
        return view('pages.admin.positions');
    })->name('admin.positions');

    Route::get('/admin/leave-types', function () {
        return view('pages.admin.leave-type');
    })->name('admin.leave-type');

    Route::get('/admin/leave-application', function () {
        return view('pages.admin.leave-application');
    })->name('admin.leave-application');

});








// employee routes

Route::middleware(['auth:sanctum', 'verified','employee'])->group(function () {
    
    Route::get('/employee/home', function () {
        return view('pages.employee.home');
    })->name('employee.home');

    Route::get('/employee/leave-application', function () {
        $isHead = auth()->user()->employee->designation->position->name == 'Head';
        if ($isHead) {
          return view('pages.employee.leave-application');
        }else{
            return redirect()->back();
        }

    })->name('employee.leave-application');

    Route::get('/employee/hr/to-approve',function(){
        $is_hr = auth()->user()->is_hr;
        if ($is_hr) {
            return view('pages.employee.to-approve');
        }else{
            return redirect()->back();
        }
    })->name('employee.to-approve');
    
});