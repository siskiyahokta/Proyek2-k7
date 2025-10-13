@extends('layouts.app')

@section('content')
  <h1 class="h4 fw-bold mb-3">{{ $game->exists ? 'Edit Game' : 'Tambah Game' }}</h1>

  <div class="card card-dark p-3">
    <form method="POST" action="{{ $game->exists ? route('admin.games.update', $game) : route('admin.games.store') }}">
      @csrf
      @if ($game->exists) @method('PUT') @endif

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Judul</label>
          <input type="text" name="title" class="form-control form-control-dark" value="{{ old('title', $game->title) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Slug (opsional)</label>
          <input type="text" name="slug" class="form-control form-control-dark" value="{{ old('slug', $game->slug) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label">Developer</label>
          <input type="text" name="developer" class="form-control form-control-dark" value="{{ old('developer', $game->developer) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label">Publisher</label>
          <input type="text" name="publisher" class="form-control form-control-dark" value="{{ old('publisher', $game->publisher) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label">Genres (pisahkan dengan koma)</label>
          <input type="text" name="genres" class="form-control form-control-dark" value="{{ old('genres', is_array($game->genres)? implode(',', $game->genres):'') }}">
        </div>
        <div class="col-md-6">
          <label class="form-label">Platforms (PS4,PS5)</label>
          <input type="text" name="platforms" class="form-control form-control-dark" value="{{ old('platforms', is_array($game->platforms)? implode(',', $game->platforms):'') }}">
        </div>
        <div class="col-md-6">
          <label class="form-label">Modes (pisahkan dengan koma)</label>
          <input type="text" name="modes" class="form-control form-control-dark" value="{{ old('modes', is_array($game->modes)? implode(',', $game->modes):'') }}">
        </div>
        <div class="col-md-6">
          <label class="form-label">Languages (pisahkan dengan koma)</label>
          <input type="text" name="languages" class="form-control form-control-dark" value="{{ old('languages', is_array($game->languages)? implode(',', $game->languages):'') }}">
        </div>

        <div class="col-md-3">
          <label class="form-label">Tahun Rilis</label>
          <input type="number" name="release_year" class="form-control form-control-dark" value="{{ old('release_year', $game->release_year) }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Size (GB)</label>
          <input type="number" name="size_gb" class="form-control form-control-dark" value="{{ old('size_gb', $game->size_gb) }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Age Rating</label>
          <input type="text" name="age_rating" class="form-control form-control-dark" value="{{ old('age_rating', $game->age_rating) }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">Rating (0-5)</label>
          <input type="number" step="0.1" name="rating" class="form-control form-control-dark" value="{{ old('rating', $game->rating) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label">Cover URL</label>
          <input type="text" name="cover" class="form-control form-control-dark" value="{{ old('cover', $game->cover) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label">Screenshots (URL, pisahkan dengan koma)</label>
          <input type="text" name="screenshots" class="form-control form-control-dark" value="{{ old('screenshots', is_array($game->screenshots)? implode(',', $game->screenshots):'') }}">
        </div>
      </div>

      <div class="mt-3 d-flex gap-2">
        <a href="{{ route('admin.games.index') }}" class="btn btn-outline-accent">Batal</a>
        <button class="btn btn-accent">{{ $game->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
      </div>
    </form>
  </div>
@endsection
