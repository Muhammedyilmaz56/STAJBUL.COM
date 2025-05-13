@extends('layouts.app')

@section('title', 'Giriş Yap')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4 border-0 rounded-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4 text-primary fw-bold"><i class="fas fa-sign-in-alt me-2"></i> Giriş Yap</h3>

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">E-posta</label>
                <input name="email" type="email" class="form-control rounded-3" placeholder="E-postanızı girin" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Şifre</label>
                <input name="password" type="password" class="form-control rounded-3" placeholder="Şifrenizi girin" required>
            </div>

            <button type="submit" class="btn btn-gradient w-100 mt-3">
                <i class="fas fa-arrow-right-to-bracket me-1"></i> Giriş Yap
            </button>
        </form>
    </div>
</div>
@endsection
