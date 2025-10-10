
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
      ['title'=>'PES 2026 patch monster','img'=>'images/pes2026patchmonster.jpg','genre'=>'Sports'],
      ['title'=>'PES 2026 eleven','img'=>'images/pes2026eleven.jpg','genre'=>'Sports'],
      ['title'=>'street fighter','img'=>'images/streetfighter.jpg','genre'=>'Racing'],
      ['title'=>'naruto x boruto','img'=>'images/narutoxboruto.jpg','genre'=>'Action'],
      ['title'=>'injustice','img'=>'images/injustice 1.jpg','genre'=>'Fighting'],
      ['title'=>'injustice 2','img'=>'images/injustice 2.jpg','genre'=>'Fighting'],
      ['title'=>'it takes two','img'=>'images/ittakestwo.jpg','genre'=>'Adventure'],
      ['title'=>'NBA 2K25','img'=>'images/NBA.jpg','genre'=>'Sports'],
      ['title'=>'Overcooked!','img'=>'images/overcooked.jpg','genre'=>'Party Simulation'],
      ['title'=>'GTA5','img'=>'images/gta5.jpg','genre'=>'Action'],
      ['title'=>'downhills','img'=>'images/downhills.jpg','genre'=>'Racing'],
      ['title'=>'FC25','img'=>'images/fc25.jpg','genre'=>'Sports'],
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
