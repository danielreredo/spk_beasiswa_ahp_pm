<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{ url('\\\lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
style="opacity: .8">
@if(auth()->user()->role == 'admin')
      <span class="brand-text font-weight-light">Administrator</span>
@endif
      
@if(auth()->user()->role == 'operator')
      <span class="brand-text font-weight-light">Operator</span>
@endif
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(auth()->user()->role == 'admin')
               @yield('menu1')
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @yield('sub_fak')
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fakultas</p>
                </a>
              </li>
              <li class="nav-item">
              @yield('sub_pro')
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prodi</p>
                </a>
              </li>
              <li class="nav-item">
                @yield('sub_per')
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode</p>
                </a>
              </li>
              <li class="nav-item">
                @yield('sub_fac')
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faktor</p>
                </a>
              </li>
              <li class="nav-item">
                @yield('sub_kri')
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                @yield('sub_kep')
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tentukan Kepentingan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                @yield('operator')
                 <i class="nav-icon fas fa-user"></i>
              <p>Data Operator</p>
            </a>
          </li>
          <li class="nav-item">
                @yield('report')
                 <i class="nav-icon fas fa-folder"></i>
              <p>Detail Seleksi</p>
            </a>
          </li>
          @endif
          @if(auth()->user()->role == 'operator')
          <li class="nav-item">
                @yield('daftarkan')
                 <i class="nav-icon fas fa-user"></i>
              <p>Daftarkan</p>
            </a>
          </li>
          <li class="nav-item">
                @yield('hasil')
                 <i class="nav-icon fas fa-folder"></i>
              <p>Hasil Seleksi</p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>