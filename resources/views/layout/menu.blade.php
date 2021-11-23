<div class="links">
    <a href="/">Home</a>
    <a href="/about">About Us</a>
    <a href="/news">News</a>
    <a href="/other">Other</a>
    <a href="/buku">Buku</a>
    @if(Auth::check() && Auth::user()->level == 'admin')
        <a href="/user"> Data User</a>
    @endif
    @if(Auth::check() && Auth::user()->level == 'admin')
        <a href="/galeri">Galeri</a>
    @endif
</div>