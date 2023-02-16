<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" href="/admin-home">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelola" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        Kelola
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseKelola" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Request::is('pengambilan') ? 'active' : ''}}" href="/admin-pengambilan">Pengambilan Mobil</a>
                            <a class="nav-link {{ Request::is('pengembalian') ? 'active' : ''}}" href="/admin-pengembalian">Pengembalian Mobil</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tabel
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseTable" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Request::is('mobil') ? 'active' : ''}}" href="/admin-list-mobil">Tabel Mobil</a>
                            <a class="nav-link {{ Request::is('konsumen') ? 'active' : ''}}" href="/admin-list-konsumen">Tabel Konsumen</a>
                            <a class="nav-link {{ Request::is('booking') ? 'active' : ''}}" href="/admin-list-booking">Tabel Booking</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="/admin-cetak">
                        <div class="sb-nav-link-icon {{ Request::is('cetak') ? 'active' : ''}}"><i class="fas fa-chart-area"></i></div>
                        Cetak
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('container')
        </main>
    <footer class="py-4 mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
            </div>
        </div>
    </footer>
    </div>
</div>