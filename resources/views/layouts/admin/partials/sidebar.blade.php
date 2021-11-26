<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{Route::is('admin.dashboard') ? 'active' : ''}}">
      <a class="nav-link"  href="{{route('admin.dashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item {{Route::is('admin.job-types.*') ? 'active' : ''}}">
      <a class="nav-link"  href="{{route('admin.job-types.index')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Job Type</span>
      </a>
    </li>

    <li class="nav-item {{Route::is('admin.jobs.*') ? 'active' : ''}}">
      <a class="nav-link"  href="{{route('admin.jobs.index')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Jobs</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.admin-logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt menu-icon"></i>
        <span class="menu-title">Log Out</span>
      </a>

      <form id="logout-form" action="{{ route('admin.admin-logout') }}" method="GET" class="d-none">
        @csrf
    </form>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>