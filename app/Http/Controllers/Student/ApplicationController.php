<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Internship;

class ApplicationController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        $applications = Application::with('internshipPosting')
            ->where('student_id', $student->id)
            ->latest()
            ->get();

        return view('student.applications.index', compact('applications'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        $student = Auth::user()->student;

        // Devam eden bir stajı varsa başvuru engelle
        if ($student->internship && is_null($student->internship->end_date)) {
            return redirect()->back()->with('error', 'Devam eden stajınız var. Yeni başvuru yapamazsınız.');
        }

        $cvPath = $request->file('cv')->store('cv_uploads', 'public');

        Application::create([
            'student_id' => $student->id,
            'internship_posting_id' => $id,
            'cv_path' => $cvPath,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return redirect()->route('student.applications.index')->with('success', 'Başvurunuz alınmıştır.');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        if ($application->student_id !== Auth::user()->student->id) {
            abort(403, 'Bu başvuru size ait değil.');
        }

        $application->delete();

        return redirect()->route('student.applications.index')->with('success', 'Başvuru iptal edildi.');
    }

    // ✅ Öğrenci stajı başlatıyor (kabul edilen başvuruyu onaylayarak)
    public function confirmAccepted($id)
    {
        $application = Application::findOrFail($id);

        if ($application->student_id !== auth()->user()->student->id || $application->status !== 'accepted') {
            return redirect()->back()->with('error', 'Bu başvuruyu onaylayamazsınız.');
        }

        // Zaten aktif stajı varsa engelle
        $hasActiveInternship = auth()->user()->student->internships()->whereNull('end_date')->exists();

        if ($hasActiveInternship) {
            return redirect()->back()->with('error', 'Devam eden bir stajınız var.');
        }

        Internship::create([
            'student_id' => $application->student_id,
            'company_id' => $application->internshipPosting->company_id,
            'start_date' => now(),
        ]);

        return redirect()->route('student.internships.index')->with('success', 'Stajınız başlatıldı.');
    }
    public function confirm($id)
{
    $student = auth()->user()->student;

    $application = \App\Models\Application::with('internshipPosting')
        ->where('id', $id)
        ->where('student_id', $student->id)
        ->where('status', 'accepted')
        ->firstOrFail();

    if ($student->internships()->whereNull('end_date')->exists()) {
        return redirect()->back()->with('error', 'Zaten aktif bir stajınız var.');
    }

    \App\Models\Internship::create([
        'student_id' => $student->id,
        'company_id' => $application->internshipPosting->company_id,
        'start_date' => now(),
    ]);

    $application->status = 'confirmed';
    $application->save();

    return redirect()->route('student.internships.index')->with('success', 'Stajınız başarıyla başlatıldı.');
}

}
