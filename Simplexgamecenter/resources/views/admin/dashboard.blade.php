@extends('layouts.admin')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 fw-bold m-0">Dashboard Admin</h1>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.games.index') }}" class="btn btn-outline-accent btn-sm">Kelola Game</a>
      <a href="{{ route('admin.consoles.index') }}" class="btn btn-accent btn-sm">Kelola Konsol</a>
    </div>
  </div>

  <!-- Stats Cards -->
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
          <div class="h3 m-0 text-high-contrast">{{ $stats['total_users'] }}</div>
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
          <div class="text-muted small">Total Rentals</div>
          <div class="h3 m-0 text-high-contrast">{{ $stats['total_rentals'] }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Pending Rentals</div>
          <div class="h3 m-0 text-warning">{{ $stats['pending_rentals'] }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card card-dark h-100">
        <div class="card-body">
          <div class="text-muted small">Active Rentals</div>
          <div class="h3 m-0 text-success">{{ $stats['active_rentals'] }}</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart: Pendapatan 7 Hari -->
  <div class="card card-dark mb-4">
    <div class="card-header">
      <h2 class="h6 m-0">Pendapatan 7 Hari Terakhir</h2>
    </div>
    <div class="card-body">
      <canvas id="revenueChart" height="100"></canvas>
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
                <th>User</th>
                <th>Durasi</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($latestRentals as $r)
                <tr>
                  <td>#{{ $r->id }}</td>
                  <td>{{ $r->console?->name ?? '—' }}</td>
                  <td>{{ $r->user?->name ?? 'Guest' }}</td>
                  <td>{{ $r->duration_hours }} jam</td>
                  <td>Rp {{ number_format($r->total_price, 0, ',', '.') }}</td>
                  <td>
                    <span class="badge bg-{{ 
                      $r->status === 'paid' ? 'success' : 
                      ($r->status === 'pending' ? 'warning' : 'secondary') 
                    }}">
                      {{ ucfirst($r->status) }}
                    </span>
                  </td>
                </tr>
              @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada data.</td></tr>
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
                <th>Konsol</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($latestPayments as $p)
                @php
                  $rental = $p->rental;
                @endphp
                <tr>
                  <td>#{{ $p->id }}</td>
                  <td>#{{ $rental?->id ?? '-' }}</td>
                  <td>{{ $rental?->console?->name ?? '-' }}</td>
                  <td>Rp {{ number_format($rental?->total_price ?? 0, 0, ',', '.') }}</td>
                  <td class="text-capitalize">{{ $p->provider }}</td>
                  <td>
                    <span class="badge bg-{{ 
                      $p->status === 'paid' ? 'success' : 
                      ($p->status === 'pending' ? 'warning' : 'danger') 
                    }}">
                      {{ ucfirst($p->status) }}
                    </span>
                  </td>
                </tr>
              @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada data.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const ctx = document.getElementById('revenueChart').getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: @json($dates),
          datasets: [{
            label: 'Pendapatan (Rp)',
            data: @json($revenues),
            borderColor: '#6366f1',
            backgroundColor: 'rgba(99, 102, 241, 0.1)',
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#6366f1',
            pointRadius: 4
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { position: 'top' },
            tooltip: {
              callbacks: {
                label: function(context) {
                  return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                }
              }
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function(value) {
                  return 'Rp ' + value.toLocaleString('id-ID');
                }
              }
            }
          }
        }
      });
    });
  </script>
@endsection