@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 fw-bold m-0">Kelola Konsol</h1>
    <a href="{{ route('admin.consoles.create') }}" class="btn btn-accent">Tambah Konsol</a>
  </div>

  <div class="card card-dark">
    <div class="table-responsive">
      <table class="table table-dark table-striped align-middle m-0">
        <thead>
        <tr>
          <th>Nama</th>
          <th>Tipe</th>
          <th>Status</th>
          <th>Tarif/Jam</th>
          <th>Disewa Hingga</th>
          <th class="text-end">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($consoles as $c)
          <tr>
            <td class="text-high-contrast">{{ $c->name }}</td>
            <td class="small">{{ $c->type }}</td>
            <td class="small">{{ $c->status }}</td>
            <td class="small">Rp {{ number_format($c->hourly_rate,0,',','.') }}</td>
            <td class="small">{{ $c->rented_until ? $c->rented_until->format('d/m H:i') : '-' }}</td>
            <td class="text-end">
              <a href="{{ route('admin.consoles.edit', $c) }}" class="btn btn-sm btn-outline-accent">Edit</a>
              <form action="{{ route('admin.consoles.destroy', $c) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus konsol ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted">Belum ada data.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-body">
      {{ $consoles->links() }}
    </div>
  </div>
@endsection
