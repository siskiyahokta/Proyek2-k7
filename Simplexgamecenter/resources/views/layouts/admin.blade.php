<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Simplex Game Center</title>

    <!-- Google Fonts: Orbitron (Cyberpunk) + Inter (Clean) -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #00d4ff;
            --primary-dark: #00a3cc;
            --secondary: #ff00aa;
            --bg-dark: #0f0f1e;
            --bg-card: #1a1a2e;
            --bg-sidebar: #16213e;
            --text: #e0e0ff;
            --text-muted: #a0a0cc;
            --border: #2a2a4e;
            --success: #00ff88;
            --warning: #ffcc00;
            --danger: #ff3366;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--bg-dark);
            color: var(--text);
            margin: 0;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
            color: var(--primary);
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #16213e 0%, #0f0f1e 100%);
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            padding: 1.5rem 0;
        }

        .admin-sidebar.collapsed {
            width: 70px;
            padding: 1.5rem 0.5rem;
        }

        .sidebar-brand {
            padding: 0 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand img {
            width: 40px;
            filter: drop-shadow(0 0 8px var(--primary));
        }

        .sidebar-brand span {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.4rem;
            color: var(--primary);
            font-weight: 700;
        }

        .nav-link {
            color: var(--text-muted) !important;
            padding: 0.75rem 1.5rem;
            border-radius: 0;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary) !important;
            background: rgba(0, 212, 255, 0.15);
            border-left: 4px solid var(--primary);
            padding-left: 1.7rem;
        }

        .nav-link i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        .nav-link span {
            transition: opacity 0.3s;
        }

        .admin-sidebar.collapsed .nav-link span {
            opacity: 0;
            width: 0;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        .admin-header {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
        }

        .header-title i {
            color: var(--primary);
        }

        .user-menu .dropdown-toggle {
            background: none;
            border: none;
            color: var(--text);
            font-weight: 500;
        }

        .user-menu .dropdown-toggle::after {
            display: none;
        }

        /* Cards */
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 212, 255, 0.2);
            border-color: var(--primary);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            font-family: 'Orbitron', sans-serif;
            color: var(--primary);
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Table */
        .table-dark {
            background: var(--bg-card);
            color: var(--text);
            border: 1px solid var(--border);
        }

        .table-dark th {
            border-top: none;
            background: rgba(0, 212, 255, 0.1);
            color: var(--primary);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .badge {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.7rem;
        }

        /* Toggle Sidebar Button */
        #toggleSidebar {
            background: none;
            border: 1px solid var(--border);
            color: var(--text);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        #toggleSidebar:hover {
            background: var(--primary);
            color: #000;
            border-color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .admin-sidebar {
                width: 70px;
                padding: 1.5rem 0.5rem;
            }
            .admin-sidebar .nav-link span {
                opacity: 0;
                width: 0;
            }
            .main-content {
                margin-left: 70px;
            }
            .sidebar-brand span {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="admin-sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" onerror="this.style.display='none'">
            <span>Simplex</span>
        </div>

        <nav class="nav flex-column px-2">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin') && !request()->is('admin/*') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.games.index') }}" class="nav-link {{ request()->is('admin/games*') ? 'active' : '' }}">
                <i class="bi bi-controller"></i>
                <span>Kelola Game</span>
            </a>
            <a href="{{ route('admin.consoles.index') }}" class="nav-link {{ request()->is('admin/consoles*') ? 'active' : '' }}">
                <i class="bi bi-tv"></i>
                <span>Kelola Konsol</span>
            </a>

            <hr class="my-4" style="border-color: var(--border);">

            <a href="{{ url('/') }}" class="nav-link">
                <i class="bi bi-house-door"></i>
                <span>Kembali ke Home</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="nav-link text-danger w-100 text-start" style="border:none;background:none;padding-left:1.5rem;">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="admin-header">
            <div class="d-flex align-items-center gap-3">
                <button id="toggleSidebar" class="d-lg-none">
                    <i class="bi bi-list"></i>
                </button>
                <div class="header-title">
                    <i class="bi bi-speedometer2"></i>
                    <span>@yield('title', 'Dashboard')</span>
                </div>
            </div>

            <div class="user-menu dropdown">
                <a class="dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4"></i>
                    <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end bg-dark border-primary">
                    <li>
    <a class="dropdown-item text-light" href="#" onclick="alert('Fitur profil belum tersedia')">Profil</a>
</li>

                    <li><hr class="dropdown-divider border-secondary"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <main class="p-4">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-x-circle-fill"></i>
                    <strong>Error!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Page Content -->
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar
        document.getElementById('toggleSidebar')?.addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('mainContent');
            sidebar.classList.toggle('collapsed');
            main.classList.toggle('expanded');
        });

        // Auto-collapse on small screens
        window.addEventListener('resize', function () {
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('mainContent');
            if (window.innerWidth < 992) {
                sidebar.classList.add('collapsed');
                main.classList.add('expanded');
            } else {
                sidebar.classList.remove('collapsed');
                main.classList.remove('expanded');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>