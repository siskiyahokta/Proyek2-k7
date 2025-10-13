@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 fw-bold m-0">Daftar Game</h1>
      <p class="text-muted m-0">Pilih kategori: PS4 atau PS5.</p>
    </div>
    <div class="d-none d-md-flex gap-2">
      <button class="btn btn-outline-accent">Filter</button>
      <button class="btn btn-accent">Urutkan</button>
    </div>
  </div>

  @php
    $ps4Games = [
      ['title'=>'PES 2026 patch monster','img'=>'images/pes2026patchmonster.jpg','genre'=>'Sports','desc'=>'Patch terbaru dengan update tim dan stadion.','developer'=>'Konami (mod)','year'=>2026,'age'=>'E'],
      ['title'=>'PES 2026 eleven','img'=>'images/pes2026eleven.jpg','genre'=>'Sports','desc'=>'Mode karier dan turnamen lengkap.','developer'=>'Konami','year'=>2026,'age'=>'E'],
      ['title'=>'street fighter','img'=>'images/streetfighter.jpg','genre'=>'Fighting','desc'=>'Pertarungan seru berbagai karakter ikonik.','developer'=>'Capcom','year'=>2023,'age'=>'T'],
      ['title'=>'naruto x boruto','img'=>'images/narutoxboruto.jpg','genre'=>'Action','desc'=>'Aksi shinobi cepat dengan jurus spektakuler.','developer'=>'Bandai Namco','year'=>2022,'age'=>'T'],
      ['title'=>'injustice','img'=>'images/injustice 1.jpg','genre'=>'Fighting','desc'=>'Pertarungan superhero DC epik.','developer'=>'NetherRealm','year'=>2013,'age'=>'T'],
      ['title'=>'injustice 2','img'=>'images/injustice 2.jpg','genre'=>'Fighting','desc'=>'Sekuel dengan roster lebih banyak.','developer'=>'NetherRealm','year'=>2017,'age'=>'T'],
    ];
    $ps5Games = [
      ['title'=>'it takes two','img'=>'images/ittakestwo.jpg','genre'=>'Adventure','desc'=>'Ko-op puzzle platform yang kreatif.','developer'=>'Hazelight','year'=>2021,'age'=>'T'],
      ['title'=>'NBA 2K25','img'=>'images/NBA.jpg','genre'=>'Sports','desc'=>'Basket generasi terbaru dengan grafis realistis.','developer'=>'Visual Concepts','year'=>2025,'age'=>'E'],
      ['title'=>'Overcooked!','img'=>'images/overcooked.jpg','genre'=>'Party Simulation','desc'=>'Chaos dapur yang seru dimainkan bersama.','developer'=>'Ghost Town Games','year'=>2016,'age'=>'E'],
      ['title'=>'GTA5','img'=>'images/gta5.jpg','genre'=>'Action','desc'=>'Open world penuh misi dan kebebasan.','developer'=>'Rockstar North','year'=>2013,'age'=>'M'],
      ['title'=>'downhills','img'=>'images/downhills.jpg','genre'=>'Racing','desc'=>'Balap sepeda turun gunung menegangkan.','developer'=>'Indie Studio','year'=>2024,'age'=>'E'],
      ['title'=>'FC25','img'=>'images/fc25.jpg','genre'=>'Sports','desc'=>'Sepak bola rasa baru dengan gameplay cepat.','developer'=>'EA','year'=>2025,'age'=>'E'],
    ];
  @endphp

  <ul class="nav nav-pills mb-4" id="gamesTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="ps4-tab" data-bs-toggle="tab" data-bs-target="#ps4" type="button" role="tab" aria-controls="ps4" aria-selected="true">PS4</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="ps5-tab" data-bs-toggle="tab" data-bs-target="#ps5" type="button" role="tab" aria-controls="ps5" aria-selected="false">PS5</button>
    </li>
  </ul>

  <div class="tab-content" id="gamesTabContent">
    <div class="tab-pane fade show active" id="ps4" role="tabpanel" aria-labelledby="ps4-tab" tabindex="0">
      <div class="row g-4">
        @foreach ($ps4Games as $game)
          @php $slug = \Illuminate\Support\Str::slug($game['title']); @endphp
          <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
            <div class="card card-dark h-100">
              <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                <img src="{{ asset($game['img']) }}" alt="Sampul {{ $game['title'] }}" class="object-fit-cover" onerror="this.src='{{ asset('images/placeholder-640x360.jpg') }}'">
              </div>
              <div class="card-body">
                <span class="badge badge-outline mb-2">{{ $game['genre'] }}</span>
                <h3 class="h6 fw-semibold mb-2 text-high-contrast">{{ $game['title'] }}</h3>
                <button
                  class="btn btn-outline-accent w-100"
                  data-bs-toggle="modal"
                  data-bs-target="#gameModal"
                  data-title="{{ $game['title'] }}"
                  data-genre="{{ $game['genre'] }}"
                  data-img="{{ asset($game['img']) }}"
                  data-platform="PS4"
                  data-description="{{ $game['desc'] }}"
                  data-developer="{{ $game['developer'] }}"
                  data-year="{{ $game['year'] }}"
                  data-age="{{ $game['age'] }}"
                >
                  Mainkan
                </button>
                <a href="{{ route('games.show', ['slug' => $slug]) }}" class="btn btn-accent w-100 mt-2">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="tab-pane fade" id="ps5" role="tabpanel" aria-labelledby="ps5-tab" tabindex="0">
      <div class="row g-4">
        @foreach ($ps5Games as $game)
          @php $slug = \Illuminate\Support\Str::slug($game['title']); @endphp
          <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
            <div class="card card-dark h-100">
              <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                <img src="{{ asset($game['img']) }}" alt="Sampul {{ $game['title'] }}" class="object-fit-cover" onerror="this.src='{{ asset('images/placeholder-640x360.jpg') }}'">
              </div>
              <div class="card-body">
                <span class="badge badge-outline mb-2">{{ $game['genre'] }}</span>
                <h3 class="h6 fw-semibold mb-2 text-high-contrast">{{ $game['title'] }}</h3>
                <button
                  class="btn btn-outline-accent w-100"
                  data-bs-toggle="modal"
                  data-bs-target="#gameModal"
                  data-title="{{ $game['title'] }}"
                  data-genre="{{ $game['genre'] }}"
                  data-img="{{ asset($game['img']) }}"
                  data-platform="PS5"
                  data-description="{{ $game['desc'] }}"
                  data-developer="{{ $game['developer'] }}"
                  data-year="{{ $game['year'] }}"
                  data-age="{{ $game['age'] }}"
                >
                  Mainkan
                </button>
                <a href="{{ route('games.show', ['slug' => $slug]) }}" class="btn btn-accent w-100 mt-2">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="modal fade" id="gameModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content card-dark">
        <div class="modal-header">
          <h5 class="modal-title m-0" id="gameModalLabel"></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12 col-md-6">
              <img id="gameModalImg" src="{{ asset('images/placeholder-640x360.jpg') }}" alt="" class="img-fluid rounded">
            </div>
            <div class="col-12 col-md-6">
              <div class="mb-2 d-flex flex-wrap gap-2">
                <span id="gameModalGenre" class="badge badge-outline"></span>
                <span id="gameModalPlatform" class="badge badge-gradient text-dark"></span>
              </div>
              <p id="gameModalDesc" class="text-muted small mb-3"></p>
              <ul class="list-group list-group-flush small mb-3">
                <li class="list-group-item bg-transparent text-muted p-1">Developer: <span class="text-high-contrast" id="gameModalDev"></span></li>
                <li class="list-group-item bg-transparent text-muted p-1">Tahun Rilis: <span class="text-high-contrast" id="gameModalYear"></span></li>
                <li class="list-group-item bg-transparent text-muted p-1">Rating Umur: <span class="text-high-contrast" id="gameModalAge"></span></li>
              </ul>
              <a id="gameModalDetail" href="#" class="btn btn-accent w-100">Detail Lengkap</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modalEl = document.getElementById('gameModal');
      if (!modalEl) return;

      modalEl.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        if (!btn) return;

        const title = btn.getAttribute('data-title') || 'Game';
        const img = btn.getAttribute('data-img') || '';
        const genre = btn.getAttribute('data-genre') || '';
        const platform = btn.getAttribute('data-platform') || '';
        const desc = btn.getAttribute('data-description') || '';
        const dev = btn.getAttribute('data-developer') || '-';
        const year = btn.getAttribute('data-year') || '-';
        const age = btn.getAttribute('data-age') || '-';
        const slug = (title || '').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');

        modalEl.querySelector('#gameModalLabel').textContent = title;
        const imgEl = modalEl.querySelector('#gameModalImg');
        imgEl.src = img || '{{ asset('images/placeholder-640x360.jpg') }}';
        imgEl.alt = 'Sampul ' + title;

        modalEl.querySelector('#gameModalGenre').textContent = genre;
        modalEl.querySelector('#gameModalPlatform').textContent = platform;
        modalEl.querySelector('#gameModalDesc').textContent = desc;

        modalEl.querySelector('#gameModalDev').textContent = dev;
        modalEl.querySelector('#gameModalYear').textContent = year;
        modalEl.querySelector('#gameModalAge').textContent = age;

        modalEl.querySelector('#gameModalDetail').setAttribute('href', "{{ url('/games') }}/" + slug);
      });
    });
  </script>
@endsection
