<nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
      <img src="{{ asset('images/logosimplex.png') }}" alt="Logo Simplex Game Center" width="32" height="32" />
      <span class="fw-bold gradient-text">Simplex Game Center</span>
    </a>
    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Navigasi">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/games') }}">Daftar Game</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/rental') }}">Rental PS4/PS5</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a></li>

        {{-- Show profile dropdown for logged-in users, admin dashboard for admins --}}
        @if (session('auth_user_id'))
          @if (session('auth_user_role') === 'admin')
            <li class="nav-item"><a class="btn btn-accent ms-lg-2" href="{{ url('/admin') }}">Admin Dashboard</a></li>
          @endif
          @include('partials.profile-dropdown')
        @else
          <li class="nav-item"><a class="btn btn-accent ms-lg-2" href="{{ url('/register') }}">Daftar</a></li>
          <li class="nav-item"><a class="btn btn-outline-accent ms-lg-2" href="{{ url('/login') }}">Masuk</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
