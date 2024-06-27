 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('testHome')}}" class="brand-link">
    <img src="{{ asset('style/dist/img/otosia_logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Sistem Persewaan Mobil</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info"> 
        <a href="{{ route('testHome') }}" class="d-block">
          <h6>Selamat datang,</h6>
          @auth
            <img src="{{ asset('style/dist/img/avatar4.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span>{{ auth()->user()->nama }}</span>
          @endauth
          <h6>Jabatan anda : {{ auth()->user()->getUserAccessFromUserAccess->user_access}}</h6>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- Sidebar Menu -->
    <nav class="mt-2"> 
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-list"></i>
              <p>Master Data</p>
              <i class="right fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"> 
              <a href="/admin/user" class="nav-link">
                <i class="fa-solid fa-user"></i>
                  <p>
                    User
                  </p>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="/admin/userApproval" class="nav-link">
                  <i class="fa-solid fa-person-circle-check"></i>
                    <p>
                      Approval
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/product" class="nav-link">
                <i class="fa-solid fa-boxes-stacked"></i>
                  <p>
                    Product
                  </p>
              </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/productCategory" class="nav-link">
                <i class="fa-solid fa-list"></i>
                  <p>
                    Product Category
                  </p>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="/admin/vehicleType" class="nav-link">
                  <i class="fa-solid fa-car"></i>
                    <p>
                      Vehicle Type
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/salesman" class="nav-link">
                <i class="fa-solid fa-person"></i>
                  <p>
                    Salesman
                  </p>
              </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/customer" class="nav-link">
                <i class="fa-solid fa-person"></i>
                  <p>
                    Customer
                  </p>
                </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/supplier" class="nav-link">
                <i class="fa-solid fa-boxes-packing"></i>
                  <p>
                    Supplier
                  </p>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="/admin/warehouse" class="nav-link">
                  <i class="fa-solid fa-warehouse"></i>
                    <p>
                      Warehouse
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/forwarder" class="nav-link">
                <i class="fa-solid fa-signs-post"></i>
                  <p>
                    Forwarder
                  </p>
              </a>
            </li>
            <li class="nav-item"> 
              <a href="/admin/backup" class="nav-link">
                <i class="fa-solid fa-rotate-right"></i>
                  <p>
                    Backup
                  </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-cart-shopping"></i>
              <p>Purchasing</p>
              <i class="right fas fa-angle-left"></i>
          </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      Purchasing Request (PR)
                    </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      PR Approval
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="#" class="nav-link">
                <i class="fa-solid fa-signs-post"></i>
                  <p>
                    Purchase Order (PO)
                  </p>
              </a>
            </li>
            <li class="nav-item"> 
              <a href="#" class="nav-link">
                <i class="fa-solid fa-rectangle-xmark"></i>
                  <p>
                    PO Approval
                  </p>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      Goods Recieve Notes
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="#" class="nav-link">
                <i class="fa-solid fa-signs-post"></i>
                  <p>
                    Invoices Recieved
                  </p>
              </a>
            </li>
            <li class="nav-item"> 
              <a href="#" class="nav-link">
                <i class="fa-solid fa-rectangle-xmark"></i>
                  <p>
                    Histori Harga Pembelian
                  </p>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      Histori Pembelian
                    </p>
                  </a>
            </li>
          </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-bag-shopping"></i>
              <p>Sales Order</p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      Sales Order
                    </p>
                  </a>
              </li>
              <li class="nav-item"> 
                  <a href="#" class="nav-link">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                      <p>
                        Picking List
                      </p>
                    </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Sales Approval
                    </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      Print Invoices
                    </p>
                  </a>
              </li>
              <li class="nav-item"> 
                  <a href="#" class="nav-link">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                      <p>
                        Revise Invoices
                      </p>
                    </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Unfulfilled Sales Order
                    </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      History Harga Penjualan
                    </p>
                  </a>
              </li>
              <li class="nav-item"> 
                  <a href="#" class="nav-link">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                      <p>
                        History Penjualan
                      </p>
                    </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Sales Analysis By Agent
                    </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Sales Analysis By Product
                    </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Sales Analysis By Customer
                    </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Sales Analysis By Area
                    </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Delivery</li>
          <li class="nav-item"> 
              <a href="#" class="nav-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  <p>
                    Delivery Order
                  </p>
              </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-warehouse"></i>
              <p>Inventory</p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="/admin/inventory/perProduct" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      Stock per Product
                    </p>
                  </a>
              </li>
              <li class="nav-item"> 
                  <a href="#" class="nav-link">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                      <p>
                        Stock per Category
                      </p>
                    </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Stock Card per Product
                    </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-rectangle-xmark"></i>
                    <p>
                      Stock Card per Date
                    </p>
                  </a>
              </li>
              <li class="nav-item"> 
                  <a href="/admin/inventory/adjustments" class="nav-link">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                      <p>
                        Stock Adjustments
                      </p>
                    </a>
              </li>
              <li class="nav-item"> 
                <a href="/admin/inventory/return" class="nav-link">
                  <i class="fa-solid fa-signs-post"></i>
                    <p>
                      Stock Returns
                    </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-money-bill"></i>
              <p>Finance</p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
              <a href="#" class="nav-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  <p>
                    Supplier Payment
                  </p>
              </a>
              </li>
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>
                      Customer Payment
                    </p>
                </a>
            </li>
            <li class="nav-item"> 
              <a href="#" class="nav-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  <p>
                    Akuntansi
                  </p>
              </a>
            </li>
          </ul>
          </li>
          <li class="nav-header">Logout</li>
          <li class="nav-item"> 
              <a href="{{ route('logout')}}" class="nav-link">
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