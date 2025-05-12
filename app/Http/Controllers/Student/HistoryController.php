<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        return view('student.history.index');
    }
}
