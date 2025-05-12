<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        return view('student.messages.index');
    }
}
