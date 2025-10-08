
@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 fw-bold m-0">Daftar Game</h1>
      <p class="text-muted m-0">Jelajahi koleksi game favoritmu.</p>
    </div>
    <div class="d-none d-md-flex gap-2">
      <button class="btn btn-outline-accent">Filter</button>
      <button class="btn btn-accent">Urutkan</button>
    </div>
  </div>

  @php
    $games = [
      ['title'=>'Elden Ring','img'=>'images/games/elden-ring.jpg','genre'=>'Action RPG'],
      ['title'=>'FIFA 24','img'=>'images/games/fifa-24.jpg','genre'=>'Sports'],
      ['title'=>'Gran Turismo 7','img'=>'images/games/gt7.jpg','genre'=>'Racing'],
      ['title'=>'Spider-Man 2','img'=>'images/games/spiderman2.jpg','genre'=>'Action'],
      ['title'=>'God of War Ragnarok','img'=>'images/games/gow-ragnarok.jpg','genre'=>'Action'],
      ['title'=>'Horizon Forbidden West','img'=>'images/games/horizon-fw.jpg','genre'=>'Adventure'],
      ['title'=>'Street Fighter 6','img'=>'images/games/sf6.jpg','genre'=>'Fighting'],
      ['title'=>'NBA 2K25','img'=>'images/games/nba-2k25.jpg','genre'=>'Sports'],
      ['title'=>'Ghost of Tsushima','img'=>'images/games/ghost.jpg','genre'=>'Action'],
      ['title'=>'Call of Duty MW3','img'=>'images/games/cod-mw3.jpg','genre'=>'Shooter'],
      ['title'=>'Resident Evil 4','img'=>'images/games/re4.jpg','genre'=>'Horror'],
      ['title'=>'Tekken 8','img'=>'images/games/tekken8.jpg','genre'=>'Fighting'],
    ];
  @endphp

  <div class="row g-4">
    @foreach ($games as $game)
      <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
        <div class="card card-dark h-100">
          <div class="ratio ratio-16x9 rounded-top overflow-hidden">
            <img src="{{ asset($game['img']) }}" alt="Sampul {{ $game['title'] }}" class="object-fit-cover">
          </div>
          <div class="card-body">
            <span class="badge badge-outline mb-2">{{ $game['genre'] }}</span>
            <h3 class="h6 fw-semibold mb-2">{{ $game['title'] }}</h3>
            <button class="btn btn-outline-accent w-100">Mainkan</button>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
