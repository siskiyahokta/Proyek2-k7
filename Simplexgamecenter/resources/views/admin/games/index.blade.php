@extends('layouts.admin')

@section('title', 'Kelola Game')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Game</h5>
                    <a href="{{ route('admin.games.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Game Baru
                    </a>
                </div>

                <div class="card-body table-responsive">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($games->isEmpty())
                        <div class="text-center py-4">
                            <p class="text-muted mb-0">Belum ada game yang terdaftar.</p>
                        </div>
                    @else
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cover</th>
                                    <th>Judul</th>
                                    <th>Developer</th>
                                    <th>Publisher</th>
                                    <th>Platform</th>
                                    <th>Genre</th>
                                    <th>Rating</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($games as $index => $game)
                                    <tr>
                                        <td>{{ $games->firstItem() + $index }}</td>
                                        <td>
                                            @if($game->cover)
                                                <img src="{{ asset($game->cover) }}" alt="cover" style="height: 50px; border-radius: 4px;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $game->title }}</td>
                                        <td>{{ $game->developer ?? '-' }}</td>
                                        <td>{{ $game->publisher ?? '-' }}</td>
                                        <td>
                                            @php
                                                $platforms = is_array($game->platforms)
                                                    ? $game->platforms
                                                    : (json_decode($game->platforms, true) ?: []);
                                            @endphp
                                            {{ !empty($platforms) ? implode(', ', $platforms) : '-' }}
                                        </td>
                                        <td>
                                            @php
                                                $genres = is_array($game->genres)
                                                    ? $game->genres
                                                    : (json_decode($game->genres, true) ?: []);
                                            @endphp
                                            {{ !empty($genres) ? implode(', ', $genres) : '-' }}
                                        </td>
                                        <td>{{ $game->rating ?? '-' }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('admin.games.edit', $game) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.games.destroy', $game) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus game ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{ $games->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
