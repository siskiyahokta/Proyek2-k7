<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Simplex Game Center</title>
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
    
    <style>
      .admin-sidebar {
        background: #1a1a2e;
        min-height: 100vh;
        padding: 20px 0;
      }
      .admin-sidebar .nav-link {
        color: #aaa;
        padding: 12px 20px;
        border-left: 3px solid transparent;
        transition: all 0.3s;
      }
      .admin-sidebar .nav-link:hover,
      .admin-sidebar .nav-link.active {
        color: #00d4ff;
        background: rgba(0, 212, 255, 0.1);
        border-left-color: #00d4ff;
      }
      .admin-header {
        background: #16213e;
        border-bottom: 1px solid #0f3460;
        padding: 15px 20px;
      }
    </style>
  </head>
  <body class="bg-app text-app">
    <div class="d-flex">
      <!-- Sidebar -->
      <div class="admin-sidebar" style="width: 250px;">
        <div class="px-3 mb-4">
          <h5 class="text-accent mb-0">Admin Panel</h5>
          <small class="text-muted">Simplex Game Center</small>
        </div>
        <nav class="nav flex-column">
          <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            📊 Dashboard
          </a>
          <a href="{{ route('admin.games.index') }}" class="nav-link {{ request()->is('admin/games*') ? 'active' : '' }}">
            🎮 Kelola Game
          </a>
          <a href="{{ route('admin.consoles.index') }}" class="nav-link {{ request()->is('admin/consoles*') ? 'active' : '' }}">
            🖥️ Kelola Konsol
          </a>
          <hr class="my-3" style="border-color: #0f3460;">
          <a href="{{ url('/') }}" class="nav-link">
            🏠 Kembali ke Home
          </a>
          <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="nav-link w-100 text-start" style="border: none; background: none;">
              🚪 Logout
            </button>
          </form>
        </nav>
      </div>

      <!-- Main Content -->
      <div class="flex-grow-1">
        <div class="admin-header">
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="m-0">Dashboard Admin</h4>
            <div class="text-muted small">
              👤 {{ session('auth_user_name') ?? 'Admin' }}
            </div>
          </div>
        </div>

        <main class="p-4">
          @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong>
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @yield('content')
        </main>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
  </body>
</html>
