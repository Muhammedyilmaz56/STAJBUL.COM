@extends('layouts.app')

@section('title', 'Şirket Paneli')

@section('content')
<div class="text-center mb-5">
    <h2 class="fw-bold">
        @php
            $logo = Auth::user()->company->logo ?? null;
        @endphp

        @if ($logo)
            <img src="{{ $logo }}" alt="Logo" style="height: 80px; object-fit: contain;" class="mb-3">
        @endif
        <br>
        {{ Auth::user()->company->company_name }}
    </h2>
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
    @php
        $items = [
            ['route' => 'company.internships.create', 'icon' => 'fa-plus', 'text' => 'İlan Oluştur'],
            ['route' => 'company.internships.index', 'icon' => 'fa-list', 'text' => 'İlanlarım'],
            ['route' => 'company.applications.index', 'icon' => 'fa-file-alt', 'text' => 'Başvurular'],
            ['route' => 'company.interns.index', 'icon' => 'fa-users', 'text' => 'Stajyerler'],
            ['route' => 'company.internships.completed', 'icon' => 'fa-check-circle', 'text' => 'Tamamlanan Stajlar'],
            ['route' => 'company.messages.index', 'icon' => 'fa-envelope', 'text' => 'Mesajlar'],
            ['route' => 'company.profile.edit', 'icon' => 'fa-pen', 'text' => 'Profili Düzenle'],
        ];
    @endphp

    @foreach ($items as $item)
        <div class="col">
            <a href="{{ route($item['route']) }}" class="btn btn-gradient btn-lg w-100 text-center py-4 shadow-sm d-flex flex-column align-items-center justify-content-center h-100">
                <i class="fa {{ $item['icon'] }} fa-2x mb-2"></i>
                <span class="fw-semibold">{{ $item['text'] }}</span>
            </a>
        </div>
    @endforeach
</div>
@endsection
