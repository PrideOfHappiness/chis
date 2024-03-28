 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('adminHome')}}" class="brand-link">
    <img src="{{ asset('style/dist/img/otosia_logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Sistem Persewaan Mobil</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info"> 
        <a href="{{ route('adminHome') }}" class="d-block">
          @auth
            <img src="{{ asset('style/dist/img/avatar3.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span>{{ auth()->user()->name }}</span>
          @endauth
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- Sidebar Menu -->
    <nav class="mt-2"> 
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Data dan Fitur</li>
        <i class="fa-solid fa-cars"></i> 
              <a href="{{ route('showMobil')}}" class="nav-link">
                <i class="fa-solid fa-car"></i> 
                  <p>
                    Lihat Inventaris Mobil
                  </p>
                </a>
          </li>
          <li class="nav-item"> 
              <a href="/users/sewa" class="nav-link">
                <i class="fa-solid fa-rectangle-xmark"></i>
                  <p>
                    Sewa Mobil
                  </p>
                </a>
          </li>
          <li class="nav-item"> 
            <a href="{{ route('showAllUsers')}}" class="nav-link">
              <i class="fa-solid fa-signs-post"></i>
                <p>
                  Histori Pengembalian Sewa Mobil
                </p>
            </a>
          </li>
          <li class="nav-header">Logout</li>
          <li class="nav-item menu-open"> 
              <a href="{{ route('logout')}}" class="nav-link active">
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