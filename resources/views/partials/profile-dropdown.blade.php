@php
    $user = auth()->user();
    $name = $user?->name ?? 'User';
    // aman untuk nama kosong, dan support UTF-8
    $initial = strtoupper(mb_substr($name, 0, 1, 'UTF-8'));
@endphp

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
     href="#"
     id="profileDropdown"
     role="button"
     data-bs-toggle="dropdown"
     aria-expanded="false">
    <div class="profile-avatar"
         style="width: 32px; height: 32px; border-radius: 50%;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex; align-items: center; justify-content: center;
                color: white; font-weight: bold; font-size: 14px;">
      {{ $initial }}
    </div>
    <span class="d-none d-lg-inline">{{ $name }}</span>
  </a>

  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
    <li><h6 class="dropdown-header mb-0">{{ $name }}</h6></li>
    <li>
      <small class="dropdown-header text-muted">
        {{ ($user?->role === 'admin') ? 'Admin' : 'User' }}
      </small>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Profil Saya</a></li>
    <li><a class="dropdown-item" href="#">Riwayat Rental</a></li>
    <li><a class="dropdown-item" href="#">Pengaturan</a></li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
        @csrf
        <button type="submit" class="dropdown-item text-danger">
          Logout
        </button>
      </form>
    </li>
  </ul>
</li>
