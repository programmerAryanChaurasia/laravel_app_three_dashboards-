<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display the teacher dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('teacher.dashboard');
    }
}
