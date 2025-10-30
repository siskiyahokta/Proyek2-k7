@extends('layouts.admin')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 fw-bold m-0">Dashboard Admin</h1>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.games.index') }}" class="btn btn-outline-accent btn-sm">Kelola Game</a>
      <a href="{{ route('admin.consoles.index') }}" class="btn btn-accent btn-sm">Kelola Konsol</a>
    </div>
  </div>

  <!-- Stats cards -->
  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Games</div>
          <div class="h3 m-0 text-high-contrast">{{ $stats['games'] }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Consoles</div>
          <div class="h3 m-0 text-high-contrast">{{ $stats['consoles'] }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Users</div>
          <div class="h3 m-0 text-high-contrast">{{ $stats['users'] }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Revenue</div>
          <div class="h5 m-0 text-accent">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Rentals</div>
          <div class="h3 m-0 text-high-contrast">{{ $stats['rentals'] }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Payments</div>
          <div class="h3 m-0 text-high-contrast">{{ $stats['payments'] }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Active Rentals</div>
          <div class="h3 m-0 text-accent">{{ $stats['active_rentals'] }}</div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <!-- Latest Rentals -->
    <div class="col-lg-6">
      <div class="card card-dark">
        <div class="card-header">
          <h2 class="h6 m-0">Rental Terbaru</h2>
        </div>
        <div class="table-responsive">
          <table class="table table-dark table-striped align-middle m-0 small">
            <thead>
              <tr>
                <th>ID</th>
                <th>Konsol</th>
                <th>Durasi</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($latestRentals as $r)
                <tr>
                  <td>#{{ $r->id }}</td>
                  <td>{{ optional($r->console)->name }}</td>
                  <td>{{ $r->duration_hours }} jam</td>
                  <td>Rp {{ number_format($r->total_price, 0, ',', '.') }}</td>
                  <td><span class="badge bg-{{ $r->status === 'paid' ? 'success' : ($r->status === 'pending' ? 'warning' : 'secondary') }}">{{ $r->status }}</span></td>
                </tr>
              @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada data.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Latest Payments -->
    <div class="col-lg-6">
      <div class="card card-dark">
        <div class="card-header">
          <h2 class="h6 m-0">Pembayaran Terbaru</h2>
        </div>
        <div class="table-responsive">
          <table class="table table-dark table-striped align-middle m-0 small">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rental</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($latestPayments as $p)
                <tr>
                  <td>#{{ $p->id }}</td>
                  <td>#{{ optional($p->rental)->id }}</td>
                  <td>Rp {{ number_format($p->amount, 0, ',', '.') }}</td>
                  <td>{{ $p->payment_method }}</td>
                  <td><span class="badge bg-{{ $p->status === 'completed' ? 'success' : ($p->status === 'pending' ? 'warning' : 'danger') }}">{{ $p->status }}</span></td>
                </tr>
              @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada data.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
