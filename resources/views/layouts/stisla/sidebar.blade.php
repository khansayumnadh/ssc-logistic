<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    @if(auth()->user()->id === 1)
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard.index') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin.dashboard.index') }}">{{ Str::limit(config('app.name'), 2, '') }}</a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-fire"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="menu-header">Data Master</li>
      <li class="{{ Request::segment(2) === 'users' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="far fa-user"></i>
          <span>Pengguna</span></a>
      </li>
      <!-- <li class="{{ Request::segment(2) === 'item-types' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.item-types.index') }}"><i class="far fa-itemmark"></i> <span>Kategori</span></a>
      </li> -->
      <li class="{{ Request::segment(2) === 'items' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.items.index') }}"><i class="fas fa-item"></i> <span>Barang</span></a>
      </li>

      @elseif(auth()->user()->id === 2)
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard.index') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin.dashboard.index') }}">{{ Str::limit(config('app.name'), 2, '') }}</a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-fire"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="menu-header">Data Master</li>
      <li class="{{ Request::segment(2) === 'users' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="far fa-user"></i>
          <span>Pengguna</span></a>
      </li>
      <!-- <li class="{{ Request::segment(2) === 'item-types' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.item-types.index') }}"><i class="far fa-itemmark"></i> <span>Kategori</span></a>
      </li> -->
      <li class="{{ Request::segment(2) === 'items' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.items.index') }}"><i class="fas fa-item"></i> <span>Barang</span></a>
      </li>
      <li
        class="nav-item dropdown {{ (Request::segment(2) === 'item-borrowers' ? 'active' : '') || Request::segment(2) === 'item-borrowers-history' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-item-reader"></i> <span>Peminjaman</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::segment(2) === 'item-borrowers' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.item-borrowers.index') }}">Peminjam </a>
          </li>
          <li class="{{ Request::segment(2) === 'item-borrowers-history' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.item-borrowers-history.index') }}">Histori Peminjam </a>
          </li>
        </ul>
      </li>

      @else
      <div class="sidebar-brand">
        <a href="{{ route('mahasiswa.dashboard.index') }}">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('mahasiswa.dashboard.index') }}">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="{{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('mahasiswa.dashboard.index') }}"><i class="fas fa-fire"></i>
            <span>Dashboard</span></a>
        </li>

        <li class="menu-header">Menu</li>
        <li
          class="nav-item dropdown {{ (Request::segment(2) === 'item-borrowers' ? 'active' : '') || Request::segment(2) === 'item-borrowers-history' ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-item-reader"></i> <span>Peminjaman</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::segment(2) === 'item-borrowers-history' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('mahasiswa.item-borrowers-history.index') }}">Histori Peminjaman Barang</a>
            </li>
          </ul>
        </li>
      </ul>
      @endif
    </ul>
    

  </aside>
</div>