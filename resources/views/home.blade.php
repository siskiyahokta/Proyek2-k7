@extends('layouts.app')

@section('content')

<!-- Hero Section with Enhanced Animations -->
<section class="hero card-dark rounded-4 p-4 p-md-5 mb-5 position-relative overflow-hidden">
  <!-- Animated Background Elements -->
  <div class="hero-bg-animation">
    <span class="particle"></span>
    <span class="particle"></span>
    <span class="particle"></span>
    <span class="particle"></span>
    <span class="particle"></span>
    <span class="particle"></span>
  </div>
  
  <div class="row align-items-center g-4 position-relative z-1">
    <div class="col-lg-7 hero-content">
      <h1 class="display-5 fw-bold text-balance mb-3 animate-slide-in">
        Selamat Datang di <span class="gradient-text">Simplex Game Center</span>
      </h1>
      <p class="lead text-muted mb-4 animate-slide-in animation-delay-1">
        Pusat hiburan gaming modern dengan suasana futuristik. Kumpulkan poin, panjatkan leaderboard, dan rasakan pengalaman bermain terbaik.
      </p>
      <div class="d-flex flex-wrap gap-3 animate-slide-in animation-delay-2">
        <a href="{{ url('/games') }}" class="btn btn-accent btn-lg hover-scale">
          <i class="bi bi-controller me-2"></i>Lihat Game
        </a>
        <a href="{{ url('/rental') }}" class="btn btn-outline-accent btn-lg hover-scale">
          <i class="bi bi-playstation me-2"></i>Sewa PS4 / PS5
        </a>
      </div>
    </div>
    <div class="col-lg-5 animate-slide-in animation-delay-3">
      <div class="hero-visual rounded-4 position-relative overflow-hidden shadow-glow">
        <img src="{{ asset('images/hero.jpg') }}" alt="Suasana Gaming Simplex" class="w-100 h-100 object-fit-cover opacity-90 hover-zoom">
        <div class="hero-glow"></div>
        <div class="hero-overlay"></div>
      </div>
    </div>
  </div>
</section>

 <section class="mb-5 reveal-on-scroll">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="h4 fw-semibold m-0">
      <i class="bi bi-graph-up-arrow text-accent me-2"></i>Statistik Member
    </h2>
  </div>
  <div class="row g-4">
    <div class="col-12 col-md-4">
      <div class="card card-dark stat-card h-100 hover-lift">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div class="flex-grow-1">
            <div class="text-muted small mb-1">Total Member</div>
            <div class="h3 m-0 stat-number gradient-text" data-counter="25">0</div>
          </div>
          <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
        <div class="card-footer bg-transparent border-0 pt-0">
          <span class="badge badge-gradient pulse">
            <i class="bi bi-arrow-up me-1"></i>+5.2%
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card card-dark stat-card h-100 hover-lift">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div class="flex-grow-1">
            <div class="text-muted small mb-1">Game Tersedia</div>
            <div class="h3 m-0 stat-number gradient-text" data-counter="20">0</div>
          </div>
          <div class="stat-icon">
            <i class="bi bi-controller"></i>
          </div>
        </div>
        <div class="card-footer bg-transparent border-0 pt-0">
          <span class="badge badge-gradient pulse">
            <i class="bi bi-star-fill me-1"></i>Baru
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card card-dark stat-card h-100 hover-lift">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div class="flex-grow-1">
            <div class="text-muted small mb-1">Jam Rental Hari Ini</div>
            <div class="h3 m-0 stat-number gradient-text" data-counter="10.00">0</div>
          </div>
          <div class="stat-icon">
            <i class="bi bi-clock-fill"></i>
          </div>
        </div>
        <div class="card-footer bg-transparent border-0 pt-0">
          <span class="badge badge-gradient pulse">
            <i class="bi bi-lightning-charge-fill me-1"></i>Aktif
          </span>
        </div>
      </div>
    </div>
  </div>
</section>


  <section class="mb-4 reveal-on-scroll">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="h4 fw-semibold m-0">
      <i class="bi bi-trophy-fill text-accent me-2"></i>Top 10 Poin
    </h2>
    <a href="#" class="link-accent small hover-scale-sm">
      Lihat semua <i class="bi bi-arrow-right ms-1"></i>
    </a>
  </div>
  <div class="card card-dark rounded-4 overflow-hidden">
    <div class="table-responsive">
      <table class="table table-dark table-hover align-middle m-0">
        <thead class="table-header-gradient">
          <tr>
            <th class="text-center" width="60">#</th>
            <th>Member</th>
            <th class="text-end">Poin</th>
            <th class="text-center" width="120">Status</th>
          </tr>
        </thead>
        <tbody>
          @php
            $leaders = [
              ['name'=>'Firly', 'points'=>9820, 'status'=>'Legend', 'color'=>'#FFD700'],
              ['name'=>'Saif', 'points'=>9540, 'status'=>'Mythic', 'color'=>'#E91E63'],
              ['name'=>'Lukman', 'points'=>9205, 'status'=>'Diamond', 'color'=>'#00BCD4'],
              ['name'=>'Hafiz', 'points'=>8990, 'status'=>'Platinum', 'color'=>'#9E9E9E'],
              ['name'=>'Cipto', 'points'=>8700, 'status'=>'Gold', 'color'=>'#FFC107'],
              ['name'=>'Karin', 'points'=>8602, 'status'=>'Gold', 'color'=>'#FFC107'],
              ['name'=>'Efa', 'points'=>8450, 'status'=>'Gold', 'color'=>'#FFC107'],
              ['name'=>'Siska', 'points'=>8320, 'status'=>'Silver', 'color'=>'#CFD8DC'],
              ['name'=>'Bunga', 'points'=>8201, 'status'=>'Silver', 'color'=>'#CFD8DC'],
              ['name'=>'Ainun', 'points'=>8100, 'status'=>'Silver', 'color'=>'#CFD8DC'],
            ];
          @endphp
          @foreach ($leaders as $i => $row)
            <tr class="leaderboard-row" style="animation-delay: {{ $i * 0.05 }}s">
              <td class="text-center">
                @if($i < 3)
                  <span class="rank-badge rank-{{ $i+1 }}">{{ $i+1 }}</span>
                @else
                  <span class="text-muted">{{ $i+1 }}</span>
                @endif
              </td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="member-avatar" style="background: linear-gradient(135deg, {{ $row['color'] }}, {{ $row['color'] }}88);">
                    {{ substr($row['name'], 0, 1) }}
                  </div>
                  <span class="fw-medium">{{ $row['name'] }}</span>
                </div>
              </td>
              <td class="text-end">
                <span class="points-display">{{ number_format($row['points'], 0, ',', '.') }}</span>
              </td>
              <td class="text-center">
                <span class="badge badge-status" style="background: {{ $row['color'] }}22; color: {{ $row['color'] }}; border: 1px solid {{ $row['color'] }}44;">
                  {{ $row['status'] }}
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection