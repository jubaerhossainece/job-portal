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
      <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt menu-icon"></i>
        <span class="menu-title">Log Out</span>
      </a>

      <form id="logout-form" action="{{ route('admin.admin-logout') }}" method="GET" class="d-none">
        @csrf
      </form>
    </li>
  </ul>
</nav>