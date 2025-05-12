@extends('layouts.app')
@section('title', 'Profili Düzenle')

@section('content')
    <h2>✏️ Profili Güncelle</h2>

    <form method="POST" action="{{ route('student.profile.update') }}">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Yeni Şifre</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Şifre Tekrar</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label>Sınıf</label>
            <input type="text" name="class" value="{{ old('class', $student->class) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Profil Fotoğrafı Linki</label>
            <input type="url" name="profile_photo" value="{{ old('profile_photo', $student->profile_photo) }}" class="form-control" placeholder="https://example.com/avatar.jpg">
        </div>

        <button type="submit" class="btn btn-success">Kaydet</button>
    </form>
@endsection
