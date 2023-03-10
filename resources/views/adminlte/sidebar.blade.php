<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin.index')}}" class="brand-link">
    <img src="{{asset('/assets/img/AdminLTELogo.png')}}" alt="{{config('app.name')}} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{config('app.name')}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/assets/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('user.index')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('soal.swap')}}" class="nav-link">
            <i class="nav-icon fas fa-sync-alt"></i>
            <p>
              Swapping Var
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('soal.terbilang')}}" class="nav-link">
            <i class="nav-icon fas fa-coins"></i>
            <p>
              Terbilang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('product.index')}}" class="nav-link">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>
              Product Stock
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" onclick="$('#signout').submit()" class="nav-link">
            <form action="{{route('logout')}}" id="signout" method="POST">
              @csrf
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </form>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>