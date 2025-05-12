@extends('layouts.app')
@section('title', 'Profilim')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="mb-0">@if($student->profile_photo)
        <img 
            src="{{ $student->profile_photo }}" 
            alt="Profil Fotoğrafı" 
            style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 1px solid #ccc;">
    @else
        <img 
            src="{{ asset('images/default-avatar.png') }}" 
            alt="Varsayılan Fotoğraf" 
            style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 1px solid #ccc;">
    @endif Profilim</h2>
    
    
</div>

<p><strong>Ad Soyad:</strong> {{ Auth::user()->name }}</p>
<p><strong>Email:</strong> {{ Auth::user()->email }}</p>
<p><strong>Öğrenci No:</strong> {{ $student->student_number }}</p>
<p><strong>Bölüm:</strong> {{ $student->department->name ?? '-' }}</p>
<p><strong>Sınıf:</strong> {{ $student->class }}</p>

<a href="{{ route('student.profile.edit') }}" class="btn btn-primary mt-3">Profili Güncelle</a>
@endsection
