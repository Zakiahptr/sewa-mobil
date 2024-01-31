<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
<div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</div>
<ul class="navbar-nav navbar-right">
    <li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
        @csrf
        <button class="btn btn-light" id="confirmLogout"><i class="fas fa-sign-out-alt mr-2"></i> Keluar </button>
    </form>
    </li>
</ul>
</nav>

