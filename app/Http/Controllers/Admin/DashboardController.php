<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        if(Auth::user()->user_type == 1){
            return view('admin.Dashboard');
         }

         else if(Auth::user()->user_type == 2){
            return view('school.Dashboard');
         }

         else if(Auth::user()->user_type == 3){
            return view('teacher.Dashboard');
         }
         else if(Auth::user()->user_type == 4){
            return view('parent.Dashboard');
         }

         else if(Auth::user()->user_type == 5){
            return view('student.Dashboard');
         }
    }
}
