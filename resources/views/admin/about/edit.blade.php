@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Halaman About</h1>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <form action="{{ route('admin.about.update') }}" method="POST">

        @csrf

        <h5 class="fw-bold">Judul</h5>
        <input type="text" name="title" value="{{ $about->title }}" class="form-control mb-3">

        <h5 class="fw-bold">Sub Judul</h5>
        <textarea name="subtitle" class="form-control mb-3">{{ $about->subtitle }}</textarea>

        <h5 class="fw-bold">Deskripsi Utama</h5>
        <textarea name="main_content" class="form-control mb-3" rows="6">{{ $about->main_content }}</textarea>

        <h5 class="fw-bold">Hero Image</h5>
        <input type="file" name="hero_image" class="form-control mb-3">
        @if ($about->hero_image)
           <img src="{{ asset('storage/'.$about->hero_image) }}" width="200" class="mb-3">
        @endif

        <hr>

        <h4 class="fw-bold mt-4">Edit Tim</h4>

        @foreach ([1,2,3] as $i)
            <div class="card p-3 mb-3">
                <h5>Anggota {{ $i }}</h5>

                <label>Nama:</label>
                <input type="text" name="team_{{ $i }}_name" 
                       class="form-control mb-2"
                       value="{{ $about->{'team_'.$i.'_name'} }}">

                <label>Role:</label>
                <input type="text" name="team_{{ $i }}_role"
                       class="form-control mb-2"
                       value="{{ $about->{'team_'.$i.'_role'} }}">

                <label>Foto:</label>
                <input type="file" name="team_{{ $i }}_image" class="form-control mb-2">

                @if ($about->{'team_'.$i.'_image'})
                    <img src="{{ asset('storage/'.$about->{'team_'.$i.'_image'}) }}" width="120">
                @endif
            </div>
        @endforeach

        <button class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
</div>
@endsection
