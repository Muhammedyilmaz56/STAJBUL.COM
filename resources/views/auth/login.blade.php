<h2>Giriş Yap</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input name="email" type="email" placeholder="E-posta"><br>
    <input name="password" type="password" placeholder="Şifre"><br>
    <button type="submit">Giriş Yap</button>
</form>
