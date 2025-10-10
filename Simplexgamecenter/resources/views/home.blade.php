
@extends('layouts.app')

@section('content')
  <section class="hero card-dark rounded-4 p-4 p-md-5 mb-5">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="display-5 fw-bold text-balance mb-3">
          Selamat Datang di <span class="gradient-text">Simplex Game Center</span>
        </h1>
        <p class="lead text-muted mb-4">
          Pusat hiburan gaming modern dengan suasana futuristik. Kumpulkan poin, panjatkan leaderboard, dan rasakan pengalaman bermain terbaik.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ url('/games') }}" class="btn btn-accent btn-lg">Lihat Game</a>
          <a href="{{ url('/rental') }}" class="btn btn-outline-accent btn-lg">Sewa PS4 / PS5</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="hero-visual rounded-4 position-relative overflow-hidden">
          <img src="{{ asset('images/hero.jpg') }}" alt="Suasana Gaming Simplex" class="w-100 h-100 object-fit-cover opacity-90">
          <div class="hero-glow"></div>
        </div>
      </div>
    </div>
  </section>

   Statistik Member 
  <section class="mb-5">
    <h2 class="h4 fw-semibold mb-3">Statistik Member</h2>
    <div class="row g-4">
      <div class="col-12 col-md-4">
        <div class="card card-dark h-100">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <div class="text-muted small mb-1">Total Member</div>
              <div class="h3 m-0">12,450</div>
            </div>
            <span class="badge badge-gradient">+5.2%</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card card-dark h-100">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <div class="text-muted small mb-1">Game Tersedia</div>
              <div class="h3 m-0">320+</div>
            </div>
            <span class="badge badge-gradient">Baru</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card card-dark h-100">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <div class="text-muted small mb-1">Jam Rental Hari Ini</div>
              <div class="h3 m-0">86</div>
            </div>
            <span class="badge badge-gradient">Aktif</span>
          </div>
        </div>
      </div>
    </div>
  </section>

   Top 10 Poin 
  <section class="mb-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="h4 fw-semibold m-0">Top 10 Poin</h2>
      <a href="#" class="link-accent small">Lihat semua</a>
    </div>
    <div class="table-responsive card-dark rounded-4">
      <table class="table table-dark align-middle m-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Member</th>
            <th>Poin</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @php
            $leaders = [
              ['name'=>'Fauzan', 'points'=>9820, 'status'=>'Legend'],
              ['name'=>'Alya', 'points'=>9540, 'status'=>'Mythic'],
              ['name'=>'Bima', 'points'=>9205, 'status'=>'Diamond'],
              ['name'=>'Rika', 'points'=>8990, 'status'=>'Platinum'],
              ['name'=>'Dika', 'points'=>8700, 'status'=>'Gold'],
              ['name'=>'Naya', 'points'=>8602, 'status'=>'Gold'],
              ['name'=>'Rian', 'points'=>8450, 'status'=>'Gold'],
              ['name'=>'Sena', 'points'=>8320, 'status'=>'Silver'],
              ['name'=>'Dewi', 'points'=>8201, 'status'=>'Silver'],
              ['name'=>'Yuda', 'points'=>8100, 'status'=>'Silver'],
            ];
          @endphp
          @foreach ($leaders as $i => $row)
            <tr>
              <td>{{ $i+1 }}</td>
              <td class="fw-medium">{{ $row['name'] }}</td>
              <td>{{ number_format($row['points'], 0, ',', '.') }}</td>
              <td><span class="badge badge-outline">{{ $row['status'] }}</span></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection
