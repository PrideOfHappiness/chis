 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('adminHome')}}" class="brand-link">
      <img src="{{ asset('style/dist/img/honda-logo-motorcycle-brand-png-16.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tes Dashboard</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info"> 
          <a href="{{ route('adminHome') }}" class="d-block">
            @auth
              {{ auth()->user()->nama_karyawan }}
            @endauth
          </a>
        </div>
      </div>
  
      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2"> 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Sidebar Admin</li>
            <li class="nav-item"> 
                <a href="/admin/karyawan" class="nav-link">
                  <i class="fa-solid fa-person"></i>
                    <p>
                      Data Karyawan
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="/admin/barang" class="nav-link">
                  <i class="fa-solid fa-motorcycle"></i>
                    <p>
                      Data Barang
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/wilayah" class="nav-link">
                <i class="fa-solid fa-location-crosshairs"></i>
                  <p>
                    Data Wilayah
                  </p>
              </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/gudang" class="nav-link">
                <i class="fa-solid fa-warehouse"></i>
                  <p>
                    Data Gudang
                  </p>
              </a>
            </li>
            <li class="nav-header">Logout</li>
            <li class="nav-item menu-open"> 
                <a href="{{ route('logout') }}" class="nav-link active">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>
                      Keluar Dari Sistem
                    </p>
                </a>
            </li>
            <li class="nav-header">Karyawan</li>
          <li class="nav-item"> 
              <a href="/karyawan/barangTersedia" class="nav-link">
                <i class="fa-solid fa-motorcycle"></i>
                  <p>
                    Barang Tersedia
                  </p>
                </a>
          </li>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Fungsi Karyawan</li>
            <li class="nav-item"> 
                <a href="/karyawan/konsumen" class="nav-link">
                  <i class="fa-solid fa-person"></i>
                    <p>
                      Konsumen
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="/karyawan/penjualan" class="nav-link">
                  <i class="fa-solid fa-cart-shopping"></i>
                    <p>
                      Penjualan Sepeda Motor
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="/karyawan/pengiriman" class="nav-link">
                  <i class="fa-solid fa-truck-fast"></i>
                    <p>
                      Pengiriman
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="/karyawan/bpkbstnk" class="nav-link">
                <i class="fa-solid fa-id-card"></i>
                  <p>
                    BPKB dan STNK
                  </p>
                </a>
          </li>
          <li class="nav-header">Karyawan Pengirim</li>
          <li class="nav-item"> 
              <a href="/karyawanPengirim/pengiriman" class="nav-link">
                <i class="fa-solid fa-truck-fast"></i>
                  <p>
                    Data Pengiriman
                  </p>
                </a>
          </li>
          <li class="nav-header">Sidebar Pemilik</li>
          <li class="nav-item"> 
              <a href="{{ route('ambilTglRekapPjl')}}" class="nav-link">
                <i class="fa-solid fa-table"></i>
                  <p>
                    Rekap Penjualan
                  </p>
                </a>
          </li>
          <li class="nav-item"> 
              <a href="{{ route('ambilTglRekapPgr')}}" class="nav-link">
                <i class="fa-solid fa-table"></i>
                  <p>
                    Rekap Pengiriman
                  </p>
                </a>
          </li>
          <li class="nav-header">Grafik</li>
          <li class="nav-item"> 
              <a href="{{ route('ambilDataSPM')}}" class="nav-link">
                <i class="fa-solid fa-chart-simple"></i>
                  <p>
                    Grafik Penjualan
                  </p>
                </a>
          </li>
          <li class="nav-item"> 
            <a href="{{ route('ambilDataKRY')}}" class="nav-link">
              <i class="fa-solid fa-person"></i>
                <p>
                  Grafik Penjualan berdasarkan Karyawan 
                </p>
              </a>
        </li>
          <li class="nav-header"> Logout</li>
          <li class="nav-item menu-open"> 
              <a href="{{ route('logout') }}" class="nav-link active">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  <p>
                    Keluar Dari Sistem
                  </p>
              </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside >
  <!-- /.control-sidebar -->
  <!-- ./wrapper -->