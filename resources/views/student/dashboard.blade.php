@extends('layouts.app') {{-- Eğer layout kullanıyorsan, yoksa direkt HTML ile başla --}}

@section('content')
    <h2>🎓 Hoş geldin, {{ Auth::user()->name }}</h2>

    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Rol:</strong> {{ Auth::user()->role }}</p>

    @if(Auth::user()->student)
        <p><strong>Öğrenci No:</strong> {{ Auth::user()->student->student_number }}</p>
        <p><strong>Bölüm:</strong> {{ Auth::user()->student->department->name ?? '-' }}</p>
        <p><strong>Sınıf:</strong> {{ Auth::user()->student->class }}</p>
    @endif

    <hr>

    <ul>
    <li><a href="{{ route('student.profile') }}">👤 Profilim</a></li>
    <li><a href="{{ route('student.internships.index') }}">📋 Tüm İlanlara Göz At</a></li>
        <li><a href="{{ route('student.applications.index') }}">📄 Başvurularım</a></li>
        <li><a href="{{ route('student.messages.index') }}">💬 Mesajlarım</a></li>
        <li><a href="{{ route('student.history.index') }}">📁 Staj Geçmişim</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">🚪 Güvenli Çıkış</button>
                <a >merhaba</a>
            </form>
        </li>
    </ul>
@endsection
