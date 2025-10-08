@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">
      <div class="card card-dark rounded-4">
        <div class="card-body p-4 p-md-5">
          <h1 class="h4 fw-bold mb-1">Registrasi</h1>
          <p class="text-muted mb-4">Buat akun baru untuk mulai bermain</p>

          <form action="{{ route('register.post') }}" method="post" novalidate>
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input id="name" name="name" type="text" class="form-control form-control-dark" placeholder="Nama lengkap" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="email" class="form-control form-control-dark" placeholder="nama@contoh.com" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Kata Sandi</label>
              <input id="password" name="password" type="password" class="form-control form-control-dark" placeholder="••••••••" required>
            </div>
            <div class="mb-4">
              <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
              <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-dark" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-accent w-100 mb-3">Daftar</button>
            <div class="text-center text-muted small">
              Sudah punya akun? <a href="{{ route('login') }}" class="link-accent">Masuk</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
