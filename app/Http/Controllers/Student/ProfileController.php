<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        return view('student.profile.index', compact('student'));
    }

    public function edit()
    {
        $student = Auth::user()->student;
        return view('student.profile.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
            'class' => 'required|string',
            'profile_photo' => 'nullable|url',
        ]);
        
        $user = Auth::user();
        $student = $user->student;
        
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        $student->class = $request->class;
        
        // Burada dosya değil, link alıyoruz
        if ($request->filled('profile_photo')) {
            $student->profile_photo = $request->profile_photo;
        }
        
        $student->save();
        
        return redirect()->route('student.profile')->with('success', 'Profil güncellendi.');
        
    }
}
