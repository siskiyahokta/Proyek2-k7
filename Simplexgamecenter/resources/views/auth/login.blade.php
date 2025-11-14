@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">
      <div class="card card-dark rounded-4">
        <div class="card-body p-4 p-md-5">
          <h1 class="h4 fw-bold mb-1">Masuk</h1>
          <p class="text-muted mb-4">Akses akun Simplex Game Center Anda</p>

          <form action="{{ route('login.post') }}" method="post" novalidate>
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="email" class="form-control form-control-dark" placeholder="nama@contoh.com" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Kata Sandi</label>
              <input id="password" name="password" type="password" class="form-control form-control-dark" placeholder="••••••••" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
              </div>
              <a href="#" class="link-accent small">Lupa sandi?</a>
            </div>
            <button type="submit" class="btn btn-accent w-100 mb-3">Masuk</button>
            <div class="text-center text-muted small">
              Belum punya akun? <a href="{{ route('register') }}" class="link-accent">Daftar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
