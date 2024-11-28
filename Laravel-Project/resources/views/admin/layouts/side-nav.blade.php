<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open"> 
          
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                {{__('lang.home')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                {{__('lang.user')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('branch')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                {{__('lang.branch')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('events')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                {{__('lang.event')}}
              </p>
            </a>
          </li>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>