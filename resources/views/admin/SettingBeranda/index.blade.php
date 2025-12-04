@extends('admin.layouts.app') 
{{-- Asumsi Anda memiliki layout Admin --}}

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">⚙️ Pengaturan Beranda & Manajemen Konten</h1>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- *********************************************** --}}
    {{-- A. FORMULIR PENGATURAN BERANDA (Konten Statis KEY-VALUE) --}}
    {{-- *********************************************** --}}
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- 1. BAGIAN UTAMA (JUDUL HERO) --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Konten Utama (Hero)</h6>
            </div>
            <div class="card-body">
                
                <div class="form-group">
                    <label for="hero_title">Judul Utama Halaman Depan</label>
                    <input type="text" 
                           class="form-control" 
                           id="hero_title" 
                           name="hero_title" 
                           value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" 
                           required>
                </div>
                {{-- ... Input hero_description dan lainnya ... --}}
            </div>
        </div>

        {{-- 2. BAGIAN LAIN (Kontak, Footer, dll.) --}}
        {{-- ... Kode untuk bagian kontak/footer di sini ... --}}
        
        <button type="submit" class="btn btn-primary mb-5">
            Simpan Pengaturan Beranda
        </button>
        
    </form>
    
    <hr class="mb-5">

    {{-- *********************************************** --}}
    {{-- B. MANAJEMEN KONTEN DINAMIS (EVENT) --}}
    {{-- *********************************************** --}}
    <div class="card shadow mb-4 border-left-success">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Manajemen Acara (Event)</h6>
            <p class="mt-2 mb-0 text-gray-600">Event dikelola di halaman terpisah karena merupakan koleksi data (banyak baris), bukan pengaturan tunggal.</p>
        </div>
        <div class="card-body">
            <p>Klik tombol di bawah untuk pergi ke halaman daftar Event. Di sana Anda dapat membuat, mengedit, dan menghapus acara.</p>
            
            {{-- Tombol untuk Mengarahkan ke Halaman CRUD Event --}}
            <a href="{{ route('admin.events.index') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-calendar-alt"></i>
                </span>
                <span class="text">Kelola Daftar Event</span>
            </a>
        </div>
    </div>
</div>
@endsection