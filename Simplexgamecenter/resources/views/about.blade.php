@extends('layouts.app')

@section('content')
<div class="py-5" style="background: url({{ asset('images/simplex-background.jpg') }}) no-repeat center center/cover; min-height: 100vh; position: relative;">
  <!-- Overlay for better text readability -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
  
  <div class="position-relative z-index-1">
    <!-- Hero Section -->
    <div class="text-center mb-5">
      <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Simplex Game Center - Pusat Gaming Terdepan di Indonesia</h1>
      <p class="lead text-white-50" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Koleksi game terlengkap, konsol terbaru, dan komunitas gamer yang solid.</p>
    </div>

    <!-- Cerita Singkat / About Us -->
    <div class="row mb-5 justify-content-center">
      <div class="col-lg-8">
        <div class="card bg-dark text-white p-4 rounded-3 shadow-lg" style="border: none; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
          <h3 class="fw-bold mb-3 text-gradient" style="background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Tentang Kami</h3>
          <p class="mb-3">
            Simplex Game Center didirikan dengan visi untuk menjadi destinasi utama bagi para gamer di Indonesia. 
            Kami percaya bahwa gaming bukan hanya sekadar hiburan, tetapi juga komunitas yang solid dan penuh kreativitas.
          </p>
          <p class="mb-3">
            Dengan pengalaman lebih dari 5 tahun di industri gaming, kami terus berinovasi untuk memberikan pengalaman 
            terbaik kepada setiap pelanggan. Dari koleksi game eksklusif hingga konsol gaming terbaru, semua tersedia 
            di satu tempat.
          </p>
          <p>
            Misi kami adalah membuat gaming lebih accessible, affordable, dan enjoyable untuk semua kalangan. 
            Kami berkomitmen untuk terus berkembang dan memberikan layanan terbaik.
          </p>
        </div>
      </div>
    </div>

    <!-- Tim Kami / Staf (with Photos, Inspired by Fauzan Net's Staf Magang) -->
    <div class="mb-5">
      <h2 class="fw-bold mb-4 text-center text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Tim Kami</h2>
      <div class="row g-4 justify-content-center">
        <!-- Owner -->
        <div class="col-md-4 col-lg-3">
          <div class="card bg-dark text-white text-center p-4 rounded-3 shadow-lg" style="transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 20px rgba(0,191,255,0.5)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
            <img src="{{ asset('images/fasido.jpg') }}" alt="Fasido" class="rounded-circle mx-auto mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #00BFFF; transition: border-color 0.3s;" onmouseover="this.style.borderColor='#FF007F';" onmouseout="this.style.borderColor='#00BFFF';">
            <h5 class="fw-bold">Fasido</h5>
            <p class="small">Owner & Pendiri</p>
            <p class="text-muted small">Visioner dengan passion tinggi di dunia gaming.</p>
          </div>
        </div>

        <!-- Manager -->
        <div class="col-md-4 col-lg-3">
          <div class="card bg-dark text-white text-center p-4 rounded-3 shadow-lg" style="transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 20px rgba(255,0,127,0.5)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
            <img src="{{ asset('images/siskiyah.jpg') }}" alt="Siskiyah" class="rounded-circle mx-auto mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #FF007F; transition: border-color 0.3s;" onmouseover="this.style.borderColor='#00BFFF';" onmouseout="this.style.borderColor='#FF007F';">
            <h5 class="fw-bold">Siskiyah</h5>
            <p class="small">Manager Operasional</p>
            <p class="text-muted small">Mengatur bisnis dengan detail dan profesional.</p>
          </div>
        </div>

        <!-- Staff -->
        <div class="col-md-4 col-lg-3">
          <div class="card bg-dark text-white text-center p-4 rounded-3 shadow-lg" style="transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 20px rgba(0,191,255,0.5)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
            <img src="{{ asset('images/alda.jpg') }}" alt="Alda" class="rounded-circle mx-auto mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #00BFFF; transition: border-color 0.3s;" onmouseover="this.style.borderColor='#FF007F';" onmouseout="this.style.borderColor='#00BFFF';">
            <h5 class="fw-bold">Alda</h5>
            <p class="small">Staff Customer Service</p>
            <p class="text-muted small">Ramah dan siap membantu setiap kebutuhan pelanggan.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Pembuat Website (Inspired by Staf, with Icons) -->
  
        </div>
      </div>
    </div>

    <!-- Kerja Sama / Partnership (Inspired by Fauzan Net) -->
    <div class="mb-5 text-center">
      <h2 class="fw-bold mb-4 text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Kerja Sama</h2>
      <div class="row justify-content-center g-4">
        <div class="col-md-3">
          <img src="{{ asset('images/midtrans-logo.png') }}" alt="Midtrans" class="img-fluid" style="max-height: 100px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3)); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
        </div>
        <div class="col-md-3">
          <img src="{{ asset('images/bca-logo.png') }}" alt="PT. Bank Central Asia" class="img-fluid" style="max-height: 100px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3)); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
        </div>
        <div class="col-md-3">
          <img src="{{ asset('images/meta-logo.png') }}" alt="Meta" class="img-fluid" style="max-height: 100px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3)); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
        </div>
      </div>
    </div>

    <!-- Nilai-Nilai Kami -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h3 class="fw-bold mb-4 text-center text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Nilai-Nilai Kami</h3>
        <div class="row g-4">
          <div class="col-md-6">
            <div class="card bg-dark text-white p-3 d-flex flex-row align-items-center gap-3 rounded-3 shadow-lg" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
              <span style="font-size: 32px; background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">🎯</span>
              <div>
                <h6 class="fw-bold">Kualitas</h6>
                <p class="small mb-0">Kami menjamin kualitas terbaik dalam setiap layanan dan produk.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-dark text-white p-3 d-flex flex-row align-items-center gap-3 rounded-3 shadow-lg" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
              <span style="font-size: 32px; background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">🤝</span>
              <div>
                <h6 class="fw-bold">Komunitas</h6>
                <p class="small mb-0">Membangun komunitas gamer yang solid dan saling mendukung.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-dark text-white p-3 d-flex flex-row align-items-center gap-3 rounded-3 shadow-lg" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
              <span style="font-size: 32px; background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">💡</span>
              <div>
                <h6 class="fw-bold">Inovasi</h6>
                <p class="small mb-0">Terus berinovasi untuk memberikan pengalaman gaming terbaik.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-dark text-white p-3 d-flex flex-row align-items-center gap-3 rounded-3 shadow-lg" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
              <span style="font-size: 32px; background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">⭐</span>
              <div>
                <h6 class="fw-bold">Kepuasan Pelanggan</h6>
                <p class="small mb-0">Kepuasan Anda adalah kesuksesan kami.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection