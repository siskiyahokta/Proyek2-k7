{{-- New troubleshooting view when DB tables are missing --}}
@extends('layouts.app')

@section('title', 'Konfigurasi Database Diperlukan')

@section('content')
<div class="container py-4">
  <div class="alert alert-danger mb-4">
    <strong>Database belum siap:</strong> Tabel "{{ $table ?? '-' }}" tidak ditemukan pada koneksi database saat ini.
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Cara memperbaiki</h5>
      <ol class="mb-3">
        <li><strong>.env arahkan ke MySQL</strong> (phpMyAdmin)
          <pre class="bg-light p-2 border rounded mb-2"><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simplexgamecenter
DB_USERNAME=YOUR_USER
DB_PASSWORD=YOUR_PASS</code></pre>
          Saat ini terdeteksi koneksi <em>sqlite</em> di error. Pastikan ganti ke mysql dan reload server.
        </li>
        <li><strong>Buat tabel</strong> menggunakan salah satu metode:
          <ul>
            <li>Import SQL: phpMyAdmin → Database <em>simplexgamecenter</em> → Import → pilih skrip <code>scripts/sql/000_full_schema_and_seed.sql</code>.</li>
            <li>Migrasi Laravel: jalankan <code>php artisan migrate --seed</code> setelah file migrasi dan seeder tersedia.</li>
          </ul>
        </li>
      </ol>
      <p class="mb-0 text-muted">Setelah selesai, muat ulang halaman ini.</p>
    </div>
  </div>
</div>
@endsection
