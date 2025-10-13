@extends('layouts.app')

@section('content')
  {{-- booking grid, modal, and JS to integrate payment --}}
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 fw-bold m-0">Rental PS4 &amp; PS5</h1>
      <p class="text-muted m-0">Pilih konsol tersedia, tentukan durasi, lalu bayar otomatis.</p>
    </div>
  </div>

  @php
    // group by type for small badges, though grid renders all
    $fmtTime = function($iso) {
      return $iso ? date('H:i', strtotime($iso)) : null;
    };
  @endphp

  <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">
    @foreach(($consoles ?? []) as $c)
      @php
        $available = ($c['status'] ?? 'available') === 'available';
        $until = $fmtTime($c['rented_until'] ?? null);
      @endphp
      <div class="col">
        <div
          class="card card-dark h-100 position-relative {{ $available ? '' : 'border-danger' }}"
          @if($available)
            role="button"
            tabindex="0"
            data-action="open-booking"
            data-console='@json($c)'
            aria-label="Pesan {{ $c['name'] }} {{ $c['type'] }}"
          @endif
          style="{{ $available ? '' : 'opacity:.6; cursor:not-allowed;' }}"
        >
          <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge {{ $available ? 'badge-gradient' : 'badge-soft' }}">{{ $c['type'] }}</span>
                <span class="badge badge-outline">{{ $c['name'] }}</span>
              </div>
              <span class="small text-muted">{{ $available ? 'Tersedia' : 'Disewa' }}</span>
            </div>
            <div class="mb-2">
              <div class="text-high-contrast fw-bold">Rp {{ number_format($c['hourly_rate'], 0, ',', '.') }}/jam</div>
              <small class="text-muted">Harga per jam</small>
            </div>
            @if(!$available)
              <div class="mt-auto">
                <div class="pill d-inline-flex align-items-center gap-2">
                  <span class="small">Selesai Pukul</span>
                  <strong class="small">{{ $until }}</strong>
                </div>
              </div>
              <div class="position-absolute top-0 start-0 w-100 h-100" style="pointer-events:none;"></div>
            @else
              <div class="mt-auto d-flex align-items-center justify-content-between">
                <small class="text-muted">Klik untuk memesan</small>
                <button type="button" class="btn btn-accent btn-sm btn-glow" data-action="open-booking" data-console='@json($c)'>
                  Pesan
                </button>
              </div>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Modal Pemesanan --}}
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content card-dark">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="bookingModalLabel">Pesan Konsol</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <div class="d-flex align-items-center justify-content-between">
              <div>
                <div class="fw-bold" id="bookingConsoleName">-</div>
                <small class="text-muted" id="bookingConsoleType">-</small>
              </div>
              <div class="text-end">
                <div class="fw-bold text-high-contrast" id="bookingHourly">Rp 0/jam</div>
                <small class="text-muted">Harga per jam</small>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="bookingDuration" class="form-label">Durasi (jam)</label>
            <select id="bookingDuration" class="form-select form-control-dark">
              @for($i=1;$i<=6;$i++)
                <option value="{{ $i }}">{{ $i }} Jam</option>
              @endfor
            </select>
          </div>

          <div class="mb-2 d-flex align-items-center justify-content-between">
            <span class="text-muted">Total Harga</span>
            <strong class="text-high-contrast" id="bookingTotal">Rp 0</strong>
          </div>

          <div class="alert alert-warning py-2 px-3 small d-none" id="bookingAlert"></div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-outline-accent" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-accent btn-glow" id="bookingPayBtn">
            Bayar Sekarang
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
(function() {
  const fmtIDR = (n) => (n || 0).toLocaleString('id-ID');
  let selected = null;
  let modal, modalEl;

  function updateTotal() {
    if (!selected) return;
    const duration = parseInt(document.getElementById('bookingDuration').value || '1', 10);
    const total = (selected.hourly_rate || 0) * duration;
    document.getElementById('bookingTotal').textContent = 'Rp ' + fmtIDR(total);
  }

  function openModal(data) {
    selected = data;
    document.getElementById('bookingConsoleName').textContent = data.name;
    document.getElementById('bookingConsoleType').textContent = data.type;
    document.getElementById('bookingHourly').textContent = 'Rp ' + fmtIDR(data.hourly_rate) + '/jam';
    document.getElementById('bookingDuration').value = '1';
    document.getElementById('bookingAlert').classList.add('d-none');
    updateTotal();
    if (!modal) {
      modalEl = document.getElementById('bookingModal');
      modal = new window.bootstrap.Modal(modalEl);
    }
    modal.show();
  }

  function bindCards() {
    document.querySelectorAll("[data-action='open-booking']").forEach((el) => {
      el.addEventListener('click', (e) => {
        try {
          const data = JSON.parse(el.getAttribute('data-console') || '{}');
          if (data && data.status === 'available') openModal(data);
        } catch (err) {
          console.log('[v0] gagal parse data-console:', err);
        }
      });
    });
  }

  function payNow() {
    if (!selected) return;
    const duration = parseInt(document.getElementById('bookingDuration').value || '1', 10);
    const payBtn = document.getElementById('bookingPayBtn');
    const alertEl = document.getElementById('bookingAlert');

    payBtn.disabled = true;
    payBtn.textContent = 'Memproses...';

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    fetch("{{ route('rental.payment-token') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrf
      },
      body: JSON.stringify({
        console_id: selected.id,
        duration: duration
      })
    })
    .then(async (r) => {
      const json = await r.json().catch(() => ({}));
      if (!r.ok || !json.ok) {
        throw new Error(json.message || 'Gagal memulai pembayaran.');
      }
      payBtn.disabled = false;
      payBtn.textContent = 'Bayar Sekarang';

      // If Midtrans Snap is available and real token returned, trigger popup
      if (window.snap && json.token && json.mode !== 'mock') {
        modal?.hide();
        window.snap.pay(json.token, {
          onSuccess: function(res){ console.log('[v0] pembayaran sukses:', res); },
          onPending: function(res){ console.log('[v0] pembayaran pending:', res); },
          onError: function(err){ console.log('[v0] pembayaran error:', err); },
          onClose: function(){ console.log('[v0] popup ditutup oleh pengguna'); }
        });
      } else {
        // Demo mode (no env configured)
        alertEl.classList.remove('d-none');
        alertEl.textContent = 'Mode demo: token mock diterima. Set MIDTRANS_SERVER_KEY & MIDTRANS_CLIENT_KEY di environment untuk mengaktifkan pembayaran.';
      }
    })
    .catch((err) => {
      console.log('[v0] error payment:', err);
      alertEl.classList.remove('d-none');
      alertEl.textContent = err.message || 'Terjadi kesalahan.';
      payBtn.disabled = false;
      payBtn.textContent = 'Bayar Sekarang';
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    bindCards();
    document.getElementById('bookingDuration').addEventListener('change', updateTotal);
    document.getElementById('bookingPayBtn').addEventListener('click', payNow);
  });
})();
</script>
@endpush
