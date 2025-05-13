@extends('layouts.app')

@section('title', 'Şirket Kayıt')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-lg p-4 border-0 rounded-4" style="max-width: 500px; width: 100%;">
        <h3 class="text-center mb-4 text-primary fw-bold"><i class="fas fa-building me-2"></i> Şirket Kayıt</h3>

        <form method="POST" action="{{ route('register.company') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Yetkili Ad Soyad</label>
                <input name="name" type="text" class="form-control rounded-3" required placeholder="Yetkili adınızı girin">
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
                <input name="password_confirmation" type="password" class="form-control rounded-3" required placeholder="Şifreyi tekrar girin">
            </div>

            <div class="mb-3">
                <label for="company_name" class="form-label">Şirket Adı</label>
                <input name="company_name" type="text" class="form-control rounded-3" required placeholder="Şirket adınızı yazın">
            </div>

            <div class="mb-3">
                <label for="tax_number" class="form-label">Vergi No</label>
                <input name="tax_number" type="text" class="form-control rounded-3" required placeholder="Vergi numaranızı girin">
            </div>

            <div class="mb-3">
                <label for="authorized_person" class="form-label">Yetkili Kişi</label>
                <input name="authorized_person" type="text" class="form-control rounded-3" required placeholder="Yetkili kişiyi yazın">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adres</label>
                <input name="address" type="text" class="form-control rounded-3" required placeholder="Şirket adresi girin">
            </div>

            <button type="submit" class="btn btn-gradient w-100 mt-3">
                <i class="fas fa-user-plus me-1"></i> Kayıt Ol
            </button>
        </form>
    </div>
</div>
@endsection
