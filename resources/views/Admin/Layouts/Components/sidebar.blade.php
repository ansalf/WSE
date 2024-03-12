<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ asset('main/logo.png') }}">
            <img class="img-circle" width="80" src="{{ asset('main/logo.png') }}" alt="Logo WSE">
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ asset('main/icon.ico') }}">
            <img class="img-circle" width="50" src="{{ asset('main/icon.ico') }}" alt="Logo WSE">
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="{{ Blade::activeMenu('dashboard') }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
        <li class="menu-header">Masters</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Masters</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">News</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Demisioners</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">Users</a></li>
              </ul>
            </li>
      </ul>    
    </aside>
  </div>