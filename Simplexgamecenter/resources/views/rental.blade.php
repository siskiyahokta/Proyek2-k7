
@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 fw-bold m-0">Rental PS4 & PS5</h1>
      <p class="text-muted m-0">Pilih paket waktu dan konsol favoritmu.</p>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-12 col-lg-6">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h5 fw-semibold m-0">PS4</h2>
            <span class="badge badge-gradient">Populer</span>
          </div>
          <div class="table-responsive">
            <table class="table table-dark align-middle m-0">
              <thead>
                <tr>
                  <th>Paket Waktu</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>1 Jam</td><td>Rp 10.000</td></tr>
                <tr><td>2 Jam</td><td>Rp 18.000</td></tr>
                <tr><td>3 Jam</td><td>Rp 25.000</td></tr>
                <tr><td>5 Jam</td><td>Rp 40.000</td></tr>
                <tr><td>All Night (6 Jam)</td><td>Rp 45.000</td></tr>
              </tbody>
            </table>
          </div>
          <button class="btn btn-accent mt-3 w-100">Pesan PS4</button>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h5 fw-semibold m-0">PS5</h2>
            <span class="badge badge-gradient">Next-Gen</span>
          </div>
          <div class="table-responsive">
            <table class="table table-dark align-middle m-0">
              <thead>
                <tr>
                  <th>Paket Waktu</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>1 Jam</td><td>Rp 15.000</td></tr>
                <tr><td>2 Jam</td><td>Rp 28.000</td></tr>
                <tr><td>3 Jam</td><td>Rp 38.000</td></tr>
                <tr><td>5 Jam</td><td>Rp 60.000</td></tr>
                <tr><td>All Night (6 Jam)</td><td>Rp 70.000</td></tr>
              </tbody>
            </table>
          </div>
          <button class="btn btn-accent mt-3 w-100">Pesan PS5</button>
        </div>
      </div>
    </div>
  </div>

  <div class="card card-dark mt-4">
    <div class="card-body">
      <h3 class="h6 fw-semibold mb-2">Catatan</h3>
      <ul class="m-0 ps-3 text-muted small">
        <li>Harga dapat berubah sewaktu-waktu sesuai kebijakan outlet.</li>
        <li>Mohon datang 10 menit sebelum jadwal bermain.</li>
        <li>Tanyakan promo bundling game terbaru kepada kasir.</li>
      </ul>
    </div>
  </div>
@endsection
