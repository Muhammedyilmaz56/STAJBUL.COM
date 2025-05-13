@extends('layouts.app')

@section('title', 'Öğrenci Kayıt')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-lg p-4 border-0 rounded-4" style="max-width: 500px; width: 100%;">
        <h3 class="text-center mb-4 text-primary fw-bold">
            <i class="fas fa-user-graduate me-2"></i> Öğrenci Kayıt
        </h3>

        <form method="POST" action="{{ route('register.student') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Ad Soyad</label>
                <input name="name" type="text" class="form-control rounded-3" required placeholder="Adınızı ve soyadınızı girin">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input name="email" type="email" class="form-control rounded-3" required placeholder="E-posta adresinizi girin">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input name="password" type="password" class="form-control rounded-3" required placeholder="Şifre oluşturun">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                <input name="password_confirmation" type="password" class="form-control rounded-3" required placeholder="Şifreyi tekrar yazın">
            </div>

            <div class="mb-3">
                <label for="student_number" class="form-label">Öğrenci No</label>
                <input name="student_number" type="text" class="form-control rounded-3" required placeholder="Öğrenci numaranız">
            </div>

            <div class="mb-3">
                <label for="department_id" class="form-label">Bölüm</label>
                <select name="department_id" class="form-select rounded-3" required>
                    <option value="">Bölüm Seçiniz</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Sınıf</label>
                <input name="class" type="text" class="form-control rounded-3" required placeholder="Kaçıncı sınıftasınız?">
            </div>

            <button type="submit" class="btn btn-gradient w-100 mt-3">
                <i class="fas fa-user-plus me-1"></i> Kayıt Ol
            </button>
        </form>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
