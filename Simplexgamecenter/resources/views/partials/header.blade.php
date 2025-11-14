{{-- FILE: resources/views/partials/header.blade.php --}}

<header class="main-header">
    <div class="header-overlay">
        
        {{-- Navigasi Atas (Logo dan Tombol Login) --}}
        <nav class="top-nav">
            <div class="brand-logo">
                <a href="{{ route('home') }}">SIMPLE X GAME CENTER</a>
            </div>
            
            <div class="auth-links">
                {{-- Cek apakah pengguna sudah login (Authenticated) --}}
                @auth
                    {{-- Ganti /profile dengan rute profile Anda --}}
                    <a href="/profile" class="btn-profile">PROFILE</a>
                @else
                    {{-- Ganti /login dengan rute login Anda --}}
                    <a href="/login" class="btn-login">LOGIN</a>
                @endauth
            </div>
        </nav>
        
        {{-- Judul Utama di Tengah Header --}}
        <div class="header-content">
            <h1>SIMPLE X GAME CENTER</h1>
        </div>

        {{-- Tempat untuk navigasi/filter tambahan (jika diperlukan di masa depan) --}}
        <div class="header-bottom-nav">
            {{-- Navigasi Lain (misalnya: Home, Daftar Game) bisa diletakkan di sini jika Anda tidak ingin di baris atas --}}
        </div>
        
    </div>
</header>