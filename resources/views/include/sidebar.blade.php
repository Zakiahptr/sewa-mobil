<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('home') }}">Rent Car</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('home') }}">RC</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li><a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

        <li class="menu-header">Pengaturan Pengguna</li>
        <li><a href="{{ route('cars.index') }}" class="nav-link"><i class="fas fa-car-side"></i><span>Menejemen Mobil</span></a></li>
        <li><a href="{{ route('rentsHistory.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Riwayat Pemesanan</span></a></li>
        </aside>
  </div>
