<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simplex Game Center</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <!-- App Theme CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  </head>
  <body class="bg-app text-app">
    @include('partials.navbar')

    <main class="py-5">
      <div class="container">
        @if (session('status'))
          <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
          </div>
        @endif
        @yield('content')
      </div>
    </main>

    <footer class="border-top border-opacity-25 py-4">
      <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-2">
          <img src="{{ asset('images/logosimplex.png') }}" alt="Logo Simplex Game Center" width="28" height="28" />
          <span class="text-muted small">© {{ date('Y') }} Simplex Game Center</span>
        </div>
        <div class="text-muted small">
          Dibuat dengan gaya modern, futuristik, dan gaming.
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <!-- JS offline untuk efek navbar & modal -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Include Midtrans Snap JS if client key set -->
    @if (env('MIDTRANS_CLIENT_KEY'))
      <script src="{{ env('MIDTRANS_IS_PRODUCTION', false) ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    @endif

    <!-- Allow pages to push scripts -->
    @stack('scripts')
  </body>
</html>
