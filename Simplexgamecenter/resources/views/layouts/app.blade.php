<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simplex Game Center</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

    @include('partials.footer')

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    @if (env('MIDTRANS_CLIENT_KEY'))
      <script src="{{ env('MIDTRANS_IS_PRODUCTION', false) ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    @endif

    @stack('scripts')
  </body>
</html>