@extends('layouts.app')

@section('content')
  <h1 class="h4 fw-bold mb-3">{{ $console->exists ? 'Edit Konsol' : 'Tambah Konsol' }}</h1>

  <div class="card card-dark p-3">
    <form method="POST" action="{{ $console->exists ? route('admin.consoles.update', $console) : route('admin.consoles.store') }}">
      @csrf
      @if ($console->exists) @method('PUT') @endif

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" name="name" class="form-control form-control-dark" value="{{ old('name', $console->name) }}" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Tipe</label>
          <select name="type" class="form-select form-control-dark" required>
            @foreach (['PS4','PS5'] as $opt)
              <option value="{{ $opt }}" @selected(old('type', $console->type) === $opt)>{{ $opt }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select form-control-dark" required>
            @foreach (['available','rented'] as $opt)
              <option value="{{ $opt }}" @selected(old('status', $console->status) === $opt)>{{ ucfirst($opt) }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Tarif / Jam (Rp)</label>
          <input type="number" name="hourly_rate" class="form-control form-control-dark" value="{{ old('hourly_rate', $console->hourly_rate) }}" min="0" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Disewa Hingga (opsional)</label>
          <input type="datetime-local" name="rented_until" class="form-control form-control-dark"
                 value="{{ old('rented_until', $console->rented_until ? $console->rented_until->format('Y-m-d\TH:i') : '') }}">
        </div>
      </div>

      <div class="mt-3 d-flex gap-2">
        <a href="{{ route('admin.consoles.index') }}" class="btn btn-outline-accent">Batal</a>
        <button class="btn btn-accent">{{ $console->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
      </div>
    </form>
  </div>
@endsection
