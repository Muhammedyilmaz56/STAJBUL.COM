<h2>Şirket Kayıt</h2>
<form method="POST" action="{{ route('register.company') }}">
    @csrf
    <input name="name" placeholder="Yetkili Ad Soyad"><br>
    <input name="email" type="email" placeholder="E-posta"><br>
    <input name="password" type="password" placeholder="Şifre"><br>
    <input name="password_confirmation" type="password" placeholder="Şifre Tekrar"><br>
    <input name="company_name" placeholder="Şirket Adı"><br>
    <input name="tax_number" placeholder="Vergi No"><br>
    <input name="authorized_person" placeholder="Yetkili Kişi"><br>
    <input name="address" placeholder="Adres"><br>
    <button type="submit">Kayıt Ol</button>
</form>
