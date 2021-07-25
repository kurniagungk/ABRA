<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ABRA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
            aria-controls="collapseTwo">
            <i class="fas fa-address-card"></i>
            <span>Nasabah</span>
        </a>
        <div id="collapseTwo"
            class="collapse {{  request()->is('nasabah') ||  request()->is('nasabah/*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{  request()->is('nasabah/create') ? 'active' : '' }}"
                    href="{{route('nasabah.create')}}">Create</a>
                <a class="collapse-item {{  request()->is('nasabah') ? 'active' : '' }}"
                    href="{{route('nasabah.index')}}">Daftar Nasabah</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi"
            class="collapse {{  request()->is('transaksi') ||  request()->is('transaksi/*') ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{  request()->is('transaksi/setor') ? 'active' : '' }}"
                    href="{{route('transaksi.setor')}}">Setor</a>
                <a class="collapse-item {{  request()->is('transaksi/tarik') ? 'active' : '' }}"
                    href="{{route('transaksi.tarik')}}">Tarik</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePinjaman"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-receipt "></i>
            <span>Pinjaman</span>
        </a>
        <div id="collapsePinjaman"
            class="collapse {{  request()->is('pinjaman') ||  request()->is('pinjaman/*') ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{  request()->is('pinjaman/create') ? 'active' : '' }}"
                    href="{{route('pinjaman.create')}}">Create Pinjaman</a>
                <a class="collapse-item {{  request()->is('pinjaman') ? 'active' : '' }}"
                    href="{{route('pinjaman.index')}}">pinjaman</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselaporan"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span>
        </a>
        <div id="collapselaporan"
            class="collapse {{  request()->is('laporan') ||  request()->is('laporan/*') ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{  request()->is('laporan') ? 'active' : '' }}"
                    href="{{route('laporan.index')}}">Laporan</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw  fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseuser" class="collapse {{  request()->is('user') ||  request()->is('user/*') ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{  request()->is('user/create') ? 'active' : '' }}"
                    href="{{route('user.create')}}">Create User</a>
                <a class="collapse-item {{  request()->is('user') ? 'active' : '' }}"
                    href="{{route('user.index')}}">User</a>
                <a class="collapse-item {{  request()->is('user/*/*') ? 'active' : '' }}"
                    href="{{route('user.edit', Auth::id())}}">Setting Iser</a>
            </div>
        </div>
    </li>

    <!--
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-cog"></i>
            <span>Setting</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

-->

    <hr class="sidebar-divider my-0">

    <li class="nav-item">

        <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ __('Logout') }}
        </a>

    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>