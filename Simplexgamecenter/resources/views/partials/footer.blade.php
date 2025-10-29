<footer class="bg-dark border-top border-opacity-25 py-5" style="background: linear-gradient(180deg, rgba(11, 15, 26, 0.95) 0%, rgba(0, 0, 0, 0.98) 100%) !important;">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('images/logosimplex.png') }}" alt="Logo Simplex Game Center" width="40" height="40" />
                    <span class="fw-bold gradient-text" style="font-size: 18px;">Simplex Game Center</span>
                </div>
                <p class="text-muted small mb-3">
                    Pusat hiburan gaming terdepan dengan koleksi game terlengkap dan konsol terbaru. Bergabunglah dengan komunitas gamer kami!
                </p>
                
                <div class="d-flex gap-2">
                    <a href="" class="btn btn-sm btn-outline-accent" target="_blank" title="Facebook">
                        <i class="bi bi-facebook"></i> 
                    </a>
                    <a href="https://www.instagram.com/simplexgamecenter?igsh=aXBxaTN0NjAyZXUy" class="btn btn-sm btn-outline-accent" target="_blank" title="Instagram">
                        <i class="bi bi-instagram"></i> 
                    </a>
                    <a href="https://wa.me/6285835308888" class="btn btn-sm btn-outline-accent" target="_blank" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i> 
                    </a>
                    <a href="URL_TWITTER_ANDA" class="btn btn-sm btn-outline-accent" target="_blank" title="Twitter">
                        <i class="bi bi-twitter"></i> 
                    </a>
                </div>
                </div>

            <div class="col-md-6 col-lg-3">
                <h6 class="fw-bold mb-3">Navigasi</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ url('/') }}" class="link-accent text-decoration-none">Beranda</a></li>
                    <li class="mb-2"><a href="{{ url('/games') }}" class="link-accent text-decoration-none">Daftar Game</a></li>
                    <li class="mb-2"><a href="{{ url('/rental') }}" class="link-accent text-decoration-none">Rental PS4/PS5</a></li>
                    <li class="mb-2"><a href="{{ url('/about') }}" class="link-accent text-decoration-none">Tentang Kami</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h6 class="fw-bold mb-3">Hubungi Kami</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <span class="text-muted">📍 Alamat:</span><br>
                        <span class="text-muted small">Jl. Gaming Center No. 123, Jakarta Selatan</span>
                    </li>
                    <li class="mb-2">
                        <span class="text-muted">📞 Telepon:</span><br>
                        <a href="tel:+62812345678" class="link-accent text-decoration-none">+62 812 345 678</a>
                    </li>
                    <li class="mb-2">
                        <span class="text-muted">📧 Email:</span><br>
                        <a href="mailto:info@simplexgamecenter.com" class="link-accent text-decoration-none">info@simplexgamecenter.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h6 class="fw-bold mb-3">Jam Operasional</h6>
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2">
                        <span class="fw-bold">Senin - Jumat:</span><br>
                        10:00 - 22:00 WIB
                    </li>
                    <li class="mb-2">
                        <span class="fw-bold">Sabtu - Minggu:</span><br>
                        09:00 - 23:00 WIB
                    </li>
                    <li class="mb-2">
                        <span class="fw-bold">Hari Libur:</span><br>
                        09:00 - 21:00 WIB
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-opacity-25 my-4">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-muted small mb-0">
                    © {{ date('Y') }} Simplex Game Center. Semua hak dilindungi.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="text-muted small mb-0">
                    Dibuat dengan ❤️ oleh <span class="gradient-text fw-bold">Fasido, Siskiyah & Alda</span>
                </p>
            </div>
        </div>
    </div>
</footer>