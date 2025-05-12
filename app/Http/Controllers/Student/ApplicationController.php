<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('student.applications.index');
    }
}
