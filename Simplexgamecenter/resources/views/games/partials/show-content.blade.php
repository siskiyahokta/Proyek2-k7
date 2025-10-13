{{-- partial reusable untuk konten detail game, digunakan oleh semua halaman detail --}}
<div class="container py-4">
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb breadcrumb-dark m-0 px-3 py-2">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/games') }}">Daftar Game</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $game['title'] ?? 'Detail' }}</li>
    </ol>
  </nav>

  <div class="position-relative hero-visual rounded overflow-hidden mb-4">
    <img src="{{ $game['cover'] }}" alt="Cover {{ $game['title'] }}" class="w-100" onerror="this.src='{{ asset('images/placeholder-640x360.jpg') }}'">
    <div class="hero-glow"></div>
  </div>

  <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-3">
    <div>
      <h1 class="fw-bold mb-2 text-high-contrast">{{ $game['title'] }}</h1>
      <div class="d-flex flex-wrap align-items-center gap-2">
        @foreach(($game['genres'] ?? []) as $g)
          <span class="badge badge-outline">{{ $g }}</span>
        @endforeach
        @foreach(($game['platforms'] ?? []) as $pf)
          <span class="badge badge-gradient text-dark">{{ $pf }}</span>
        @endforeach
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      @php $rating = (int) round($game['rating'] ?? 0); @endphp
      <div class="d-flex align-items-center">
        @for ($i = 1; $i <= 5; $i++)
          @if ($i <= $rating)
            <svg width="22" height="22" viewBox="0 0 24 24" fill="#fbbf24" xmlns="http://www.w3.org/2000/svg"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.786 1.401 8.168L12 18.896l-7.335 3.868 1.401-8.168L.132 9.21l8.2-1.192L12 .587z"/></svg>
          @else
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.786 1.401 8.168L12 18.896l-7.335 3.868 1.401-8.168L.132 9.21l8.2-1.192L12 .587z"/></svg>
          @endif
        @endfor
      </div>
      <span class="text-muted small">{{ number_format($game['rating'] ?? 0, 1) }}</span>
    </div>
  </div>

  <div class="row g-3 mb-4 game-meta">
    <div class="col-6 col-lg-3">
      <div class="card card-dark p-3 h-100">
        <div class="meta-label small">Developer</div>
        <div class="meta-value">{{ $game['developer'] ?? '-' }}</div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card card-dark p-3 h-100">
        <div class="meta-label small">Publisher</div>
        <div class="meta-value">{{ $game['publisher'] ?? '-' }}</div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card card-dark p-3 h-100">
        <div class="meta-label small">Tahun Rilis</div>
        <div class="meta-value">{{ $game['release_year'] ?? '-' }}</div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card card-dark p-3 h-100">
        <div class="meta-label small">Rating Umur</div>
        <div class="meta-value">{{ $game['age_rating'] ?? '-' }}</div>
      </div>
    </div>
  </div>

  <div class="row g-4 mb-4">
    <div class="col-12 col-lg-7">
      <div class="card card-dark p-3 h-100">
        <h2 class="section-title h5 mb-2">Alur Cerita</h2>
        <p class="text-muted mb-0">{{ $game['storyline'] ?? '-' }}</p>
      </div>
    </div>
    <div class="col-12 col-lg-5">
      <div class="card card-dark p-3 h-100">
        <h2 class="section-title h5 mb-2">Spesifikasi</h2>
        <ul class="list-unstyled m-0 small">
          <li class="mb-2 meta-label">Mode: <span class="meta-value">{{ implode(', ', $game['modes'] ?? []) }}</span></li>
          <li class="mb-2 meta-label">Platform: <span class="meta-value">{{ implode(', ', $game['platforms'] ?? []) }}</span></li>
          <li class="mb-2 meta-label">Ukuran: <span class="meta-value">{{ $game['size_gb'] ?? '-' }} GB</span></li>
          <li class="mb-2 meta-label">Bahasa: <span class="meta-value">{{ implode(', ', $game['languages'] ?? []) }}</span></li>
        </ul>
      </div>
    </div>
  </div>

  @if (!empty($game['features']))
    <div class="card card-dark p-3 mb-4">
      <h2 class="section-title h5 mb-2">Fitur Utama</h2>
      <ul class="m-0 ps-3">
        @foreach ($game['features'] as $feat)
          <li class="text-muted">{{ $feat }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if (!empty($game['screenshots']))
    <div class="card card-dark p-3">
      <h2 class="section-title h5 mb-3">Galeri</h2>
      <div class="row g-3">
        @foreach ($game['screenshots'] as $shot)
          <div class="col-6 col-md-4">
            <div class="ratio ratio-16x9 rounded overflow-hidden">
              <img src="{{ $shot }}" alt="Screenshot {{ $game['title'] }}" class="object-fit-cover" onerror="this.src='{{ asset('images/placeholder-640x360.jpg') }}'">
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif

  <div class="sticky-action-bar mt-4 py-2">
    <div class="container d-flex flex-wrap gap-2 justify-content-end">
      <a href="{{ url()->previous() }}" class="btn btn-outline-accent">Kembali</a>
      <a href="{{ url('/games') }}" class="btn btn-accent">Jelajah Game</a>
    </div>
  </div>
</div>
