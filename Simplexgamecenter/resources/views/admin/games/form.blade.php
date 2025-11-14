@extends('layouts.admin')

@section('title', $game->exists ? 'Edit Game' : 'Tambah Game')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="mb-0">{{ $game->exists ? 'Edit Game' : 'Tambah Game' }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data"
                          action="{{ $game->exists ? route('admin.games.update', $game) : route('admin.games.store') }}">
                        @csrf
                        @if($game->exists) @method('PUT') @endif

                        <!-- Judul -->
                        <div class="mb-3">
                            <label class="form-label">Judul Game</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $game->title) }}" required>
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label class="form-label">Slug (Opsional)</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $game->slug) }}">
                        </div>

                        <!-- Developer & Publisher -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Developer</label>
                                <input type="text" name="developer" class="form-control" value="{{ old('developer', $game->developer) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Publisher</label>
                                <input type="text" name="publisher" class="form-control" value="{{ old('publisher', $game->publisher) }}">
                            </div>
                        </div>

                        <!-- Platform, Genres, Modes, Languages -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Platforms (pisah koma)</label>
                                <input type="text" name="platforms" class="form-control" value="{{ old('platforms', is_array($game->platforms)? implode(',', $game->platforms):'') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Genres (pisah koma)</label>
                                <input type="text" name="genres" class="form-control" value="{{ old('genres', is_array($game->genres)? implode(',', $game->genres):'') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Modes (pisah koma)</label>
                                <input type="text" name="modes" class="form-control" value="{{ old('modes', is_array($game->modes)? implode(',', $game->modes):'') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Languages (pisah koma)</label>
                                <input type="text" name="languages" class="form-control" value="{{ old('languages', is_array($game->languages)? implode(',', $game->languages):'') }}">
                            </div>
                        </div>

                        <!-- Tahun, Ukuran, Rating -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tahun Rilis</label>
                                <input type="number" name="release_year" class="form-control" value="{{ old('release_year', $game->release_year) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Size (GB)</label>
                                <input type="number" name="size_gb" class="form-control" value="{{ old('size_gb', $game->size_gb) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Rating (0-10)</label>
                                <input type="number" step="0.1" name="rating" class="form-control" value="{{ old('rating', $game->rating) }}">
                            </div>
                        </div>

                        <!-- Cover -->
                        <div class="mb-3">
                            <label class="form-label">Cover</label>
                            <input type="file" name="cover" class="form-control" accept="image/*">
                        </div>

                        <!-- Screenshots -->
                        <div class="mb-3">
                            <label class="form-label">Screenshots</label>
                            <input type="file" name="screenshots[]" multiple class="form-control" accept="image/*">
                        </div>

                        <!-- Storyline -->
                        <div class="mb-3">
                            <label class="form-label">Storyline</label>
                            <textarea name="storyline" class="form-control" rows="4">{{ old('storyline', $game->storyline) }}</textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection