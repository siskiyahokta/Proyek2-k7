@extends('layouts.app')

@section('content')
<div class="py-5" style="background: url({{ asset('images/aboutsimplex2.jpg') }}) no-repeat center center/cover; min-height: 100vh; position: relative;">
  <!-- Overlay for better text readability -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 15, 40, 0.8) 100%);"></div>
  
  <div class="position-relative z-index-1">
    <!-- Hero Section with Animation -->
    <div class="text-center mb-5" style="animation: fadeInDown 1s ease-in-out;">
      <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-size: 3.5rem;">
        Simplex Game Center
      </h1>
      <div style="width: 100px; height: 4px; background: linear-gradient(90deg, #00BFFF, #FF007F); margin: 0 auto 20px;"></div>
      <p class="lead text-white-50" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5); font-size: 1.3rem;">
        Pusat Gaming Terdepan di Indonesia
      </p>
      <p class="text-white-50" style="max-width: 700px; margin: 0 auto;">
        Koleksi game terlengkap, konsol terbaru, dan komunitas gamer yang solid.
      </p>
    </div>

    <!-- About Us Section - Redesigned dengan Split Layout -->
    <div class="row mb-5 justify-content-center align-items-center g-4">
      <!-- Left Side - Image -->
      <div class="col-lg-5">
        <div style="position: relative; overflow: hidden; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 191, 255, 0.3);">
          <!-- Gunakan gambar gaming center/konsol/gaming setup -->
          <img src="{{ asset('images/aboutsimplex.jpg') }}" 
               alt="Simplex Gaming Center" 
               class="img-fluid" 
               style="width: 100%; height: 400px; object-fit: cover; transition: transform 0.5s;"
               onmouseover="this.style.transform='scale(1.1)';" 
               onmouseout="this.style.transform='scale(1)';">
          
          <!-- Overlay Badge -->
          <div style="position: absolute; bottom: 20px; left: 20px; background: linear-gradient(135deg, #00BFFF, #FF007F); padding: 15px 25px; border-radius: 10px;">
          </div>
        </div>
      </div>

      <!-- Right Side - Content -->
      <div class="col-lg-6">
        <div class="ps-lg-4">
          <span class="badge px-3 py-2 mb-3" style="background: linear-gradient(135deg, #00BFFF, #FF007F); font-size: 0.9rem;">
            TENTANG KAMI
          </span>
          
          <h2 class="fw-bold text-white mb-4" style="font-size: 2.5rem; line-height: 1.2;">
            Destinasi Utama Para <span style="background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Gamer Indonesia</span>
          </h2>
          
          <p class="text-white-50 mb-3" style="font-size: 1.1rem; line-height: 1.8;">
            Simplex Game Center didirikan dengan visi untuk menjadi destinasi utama bagi para gamer di Indonesia. 
            Kami percaya bahwa <strong class="text-white">gaming bukan hanya sekadar hiburan</strong>, tetapi juga 
            komunitas yang solid dan penuh kreativitas.
          </p>
          
          <p class="text-white-50 mb-3" style="font-size: 1.1rem; line-height: 1.8;">
            Dengan pengalaman lebih dari 5 tahun di industri gaming, kami terus berinovasi untuk memberikan 
            <strong class="text-white">pengalaman terbaik</strong> kepada setiap pelanggan.
          </p>

          <!-- Stats Row -->
          <div class="row g-3 mt-4">
            <div class="col-4">
              <div class="text-center p-3" style="background: rgba(0, 191, 255, 0.1); border-radius: 10px; border: 1px solid rgba(0, 191, 255, 0.3);">
                <h3 class="fw-bold mb-0" style="background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">30+</h3>
                <p class="text-white-50 small mb-0">Game Koleksi</p>
              </div>
            </div>
            <div class="col-4">
              <div class="text-center p-3" style="background: rgba(255, 0, 127, 0.1); border-radius: 10px; border: 1px solid rgba(255, 0, 127, 0.3);">
                <h3 class="fw-bold mb-0" style="background: linear-gradient(135deg, #FF007F, #00BFFF); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">1k+</h3>
                <p class="text-white-50 small mb-0">Pelanggan</p>
              </div>
            </div>
            <div class="col-4">
              <div class="text-center p-3" style="background: rgba(0, 191, 255, 0.1); border-radius: 10px; border: 1px solid rgba(0, 191, 255, 0.3);">
                <h3 class="fw-bold mb-0" style="background: linear-gradient(135deg, #00BFFF, #FF007F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">24/7</h3>
                <p class="text-white-50 small mb-0">Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mission & Vision Cards -->
    <div class="row mb-5 justify-content-center g-4">
      <div class="col-lg-5">
        <div class="card h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(0, 191, 255, 0.1) 0%, rgba(0, 15, 40, 0.8) 100%); border-radius: 20px; overflow: hidden; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-3">
              <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #00BFFF, #0080FF); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 30px;">
                🎯
              </div>
              <h4 class="fw-bold text-white ms-3 mb-0">Misi Kami</h4>
            </div>
            <p class="text-white-50" style="line-height: 1.8;">
              Membuat gaming lebih <strong class="text-white">accessible, affordable, dan enjoyable</strong> untuk semua kalangan. 
              Kami berkomitmen untuk terus berkembang dan memberikan layanan terbaik kepada komunitas gamer Indonesia.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(255, 0, 127, 0.1) 0%, rgba(40, 0, 15, 0.8) 100%); border-radius: 20px; overflow: hidden; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-3">
              <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #FF007F, #FF0040); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 30px;">
                🚀
              </div>
              <h4 class="fw-bold text-white ms-3 mb-0">Visi Kami</h4>
            </div>
            <p class="text-white-50" style="line-height: 1.8;">
              Menjadi <strong class="text-white">pusat gaming #1 di Indonesia</strong> yang dikenal dengan koleksi lengkap, 
              layanan berkualitas, dan komunitas yang aktif. Kami ingin setiap gamer merasa seperti di rumah sendiri.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Tim Kami / Staf -->
    <div class="mb-5">
      <div class="text-center mb-5">
        <span class="badge px-3 py-2 mb-3" style="background: linear-gradient(135deg, #00BFFF, #FF007F); font-size: 0.9rem;">
          TIM PROFESIONAL
        </span>
        <h2 class="fw-bold text-white" style="font-size: 2.5rem;">Orang-Orang di Balik Simplex</h2>
        <p class="text-white-50">Tim berpengalaman yang siap melayani Anda</p>
      </div>

      <div class="row g-4 justify-content-center">
        <!-- Owner -->
        <div class="col-md-4 col-lg-3">
          <div class="card border-0 text-center p-4 shadow-lg" style="background: rgba(0, 15, 40, 0.8); border-radius: 20px; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-15px)'; this.style.boxShadow='0 20px 40px rgba(0,191,255,0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.3)';">
            <div style="position: relative; width: 150px; height: 150px; margin: 0 auto 20px;">
              <img src="{{ asset('images/idoy1.jpg') }}" 
                   alt="Fasido" 
                   class="rounded-circle" 
                   style="width: 100%; height: 100%; object-fit: cover; border: 4px solid transparent; background: linear-gradient(white, white) padding-box, linear-gradient(135deg, #00BFFF, #FF007F) border-box;">
              <!-- Badge -->
              <div style="position: absolute; bottom: 5px; right: 5px; width: 35px; height: 35px; background: linear-gradient(135deg, #00BFFF, #FF007F); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid rgba(0, 15, 40, 0.8);">
                <span style="font-size: 16px;">👑</span>
              </div>
            </div>
            <h5 class="fw-bold text-white mb-1">Fasido</h5>
            <p class="small mb-2" style="color: #00BFFF;">Frontend dev</p>
          </div>
        </div>

        <!-- Manager -->
        <div class="col-md-4 col-lg-3">
          <div class="card border-0 text-center p-4 shadow-lg" style="background: rgba(0, 15, 40, 0.8); border-radius: 20px; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-15px)'; this.style.boxShadow='0 20px 40px rgba(255,0,127,0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.3)';">
            <div style="position: relative; width: 150px; height: 150px; margin: 0 auto 20px;">
              <img src="{{ asset('images/cia1.jpg') }}" 
                   alt="Siskiyah" 
                   class="rounded-circle" 
                   style="width: 100%; height: 100%; object-fit: cover; border: 4px solid transparent; background: linear-gradient(white, white) padding-box, linear-gradient(135deg, #FF007F, #00BFFF) border-box;">
              <!-- Badge -->
              <div style="position: absolute; bottom: 5px; right: 5px; width: 35px; height: 35px; background: linear-gradient(135deg, #FF007F, #00BFFF); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid rgba(0, 15, 40, 0.8);">
                <span style="font-size: 16px;">💼</span>
              </div>
            </div>
            <h5 class="fw-bold text-white mb-1">Siskiyah</h5>
            <p class="small mb-2" style="color: #FF007F;">UI UX Designer</p>
          </div>
        </div>

        <!-- Staff -->
        <div class="col-md-4 col-lg-3">
          <div class="card border-0 text-center p-4 shadow-lg" style="background: rgba(0, 15, 40, 0.8); border-radius: 20px; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-15px)'; this.style.boxShadow='0 20px 40px rgba(0,191,255,0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.3)';">
            <div style="position: relative; width: 150px; height: 150px; margin: 0 auto 20px;">
              <img src="{{ asset('images/alda.jpg') }}" 
                   alt="Alda" 
                   class="rounded-circle" 
                   style="width: 100%; height: 100%; object-fit: cover; border: 4px solid transparent; background: linear-gradient(white, white) padding-box, linear-gradient(135deg, #00BFFF, #FF007F) border-box;">
              <!-- Badge -->
              <div style="position: absolute; bottom: 5px; right: 5px; width: 35px; height: 35px; background: linear-gradient(135deg, #00BFFF, #FF007F); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid rgba(0, 15, 40, 0.8);">
                <span style="font-size: 16px;">🎧</span>
              </div>
            </div>
            <h5 class="fw-bold text-white mb-1">Alda</h5>
            <p class="small mb-2" style="color: #00BFFF;">Backend dev</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Kerja Sama / Partnership -->
    <div class="mb-5 text-center">
      <div class="mb-4">
        <span class="badge px-3 py-2 mb-3" style="background: linear-gradient(135deg, #00BFFF, #FF007F); font-size: 0.9rem;">
          PARTNER TERPERCAYA
        </span>
        <h2 class="fw-bold text-white" style="font-size: 2.5rem;">Kerja Sama</h2>
      </div>
      
      <div class="row justify-content-center g-4">
        <div class="col-md-3">
          <div class="d-flex align-items-center justify-content-center p-4" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px; height: 150px; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 30px rgba(0,191,255,0.3)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
            <img src="{{ asset('images/.jpg') }}" alt="Politeknik Negeri Indramayu" class="img-fluid" style="max-height: 90px; max-width: 100%; object-fit: contain;">
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex align-items-center justify-content-center p-4" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px; height: 150px; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 30px rgba(255,0,127,0.3)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
            <img src="{{ asset('images/bca-logo.png') }}" alt="PT. Bank Central Asia" class="img-fluid" style="max-height: 90px; max-width: 100%; object-fit: contain;">
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex align-items-center justify-content-center p-4" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px; height: 150px; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 30px rgba(0,191,255,0.3)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
            <img src="{{ asset('images/meta-logo.png') }}" alt="Meta" class="img-fluid" style="max-height: 90px; max-width: 100%; object-fit: contain;">
          </div>
        </div>
      </div>
    </div>

    <!-- Nilai-Nilai Kami - Redesigned -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="text-center mb-5">
          <span class="badge px-3 py-2 mb-3" style="background: linear-gradient(135deg, #00BFFF, #FF007F); font-size: 0.9rem;">
            KOMITMEN KAMI
          </span>
          <h2 class="fw-bold text-white" style="font-size: 2.5rem;">Nilai-Nilai Kami</h2>
          <p class="text-white-50">Prinsip yang kami pegang dalam setiap pelayanan</p>
        </div>
        
        <div class="row g-4">
          <div class="col-md-6">
            <div class="card border-0 p-4 h-100 shadow-lg" style="background: linear-gradient(135deg, rgba(0, 191, 255, 0.1), rgba(0, 15, 40, 0.8)); border-radius: 20px; transition: transform 0.3s;" onmouseover="this.style.transform='translateX(10px)';" onmouseout="this.style.transform='translateX(0)';">
              <div class="d-flex align-items-start gap-3">
                <div style="min-width: 60px; height: 60px; background: linear-gradient(135deg, #00BFFF, #0080FF); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                  🎯
                </div>
                <div>
                  <h5 class="fw-bold text-white mb-2">Kualitas Terjamin</h5>
                  <p class="text-white-50 small mb-0">Kami menjamin kualitas terbaik dalam setiap layanan dan produk yang kami tawarkan.</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card border-0 p-4 h-100 shadow-lg" style="background: linear-gradient(135deg, rgba(255, 0, 127, 0.1), rgba(40, 0, 15, 0.8)); border-radius: 20px; transition: transform 0.3s;" onmouseover="this.style.transform='translateX(10px)';" onmouseout="this.style.transform='translateX(0)';">
              <div class="d-flex align-items-start gap-3">
                <div style="min-width: 60px; height: 60px; background: linear-gradient(135deg, #FF007F, #FF0040); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                  🤝
                </div>
                <div>
                  <h5 class="fw-bold text-white mb-2">Komunitas Solid</h5>
                  <p class="text-white-50 small mb-0">Membangun komunitas gamer yang solid, saling mendukung, dan berkembang bersama.</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card border-0 p-4 h-100 shadow-lg" style="background: linear-gradient(135deg, rgba(0, 191, 255, 0.1), rgba(0, 15, 40, 0.8)); border-radius: 20px; transition: transform 0.3s;" onmouseover="this.style.transform='translateX(10px)';" onmouseout="this.style.transform='translateX(0)';">
              <div class="d-flex align-items-start gap-3">
                <div style="min-width: 60px; height: 60px; background: linear-gradient(135deg, #00BFFF, #0080FF); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                  💡
                </div>
                <div>
                  <h5 class="fw-bold text-white mb-2">Inovasi Berkelanjutan</h5>
                  <p class="text-white-50 small mb-0">Terus berinovasi untuk memberikan pengalaman gaming terbaik dan terdepan.</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card border-0 p-4 h-100 shadow-lg" style="background: linear-gradient(135deg, rgba(255, 0, 127, 0.1), rgba(40, 0, 15, 0.8)); border-radius: 20px; transition: transform 0.3s;" onmouseover="this.style.transform='translateX(10px)';" onmouseout="this.style.transform='translateX(0)';">
              <div class="d-flex align-items-start gap-3">
                <div style="min-width: 60px; height: 60px; background: linear-gradient(135deg, #FF007F, #FF0040); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                  ⭐
                </div>
                <div>
                  <h5 class="fw-bold text-white mb-2">Kepuasan Pelanggan</h5>
                  <p class="text-white-50 small mb-0">Kepuasan Anda adalah kesuksesan kami, selalu prioritas utama.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.z-index-1 {
  z-index: 1;
}
</style>
@endsection