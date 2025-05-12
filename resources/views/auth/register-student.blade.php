<h2>Öğrenci Kayıt</h2>
<form method="POST" action="{{ route('register.student') }}">
    @csrf
    <input name="name" placeholder="Ad Soyad"><br>
    <input name="email" type="email" placeholder="E-posta"><br>
    <input name="password" type="password" placeholder="Şifre"><br>
    <input name="password_confirmation" type="password" placeholder="Şifre Tekrar"><br>
    <input name="student_number" placeholder="Öğrenci No"><br>

    <select name="department_id">
        <option value="">Bölüm Seçiniz</option>
        @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
    </select><br>

    <input name="class" placeholder="Sınıf"><br>
    <button type="submit">Kayıt Ol</button>
</form>

