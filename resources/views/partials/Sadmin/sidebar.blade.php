<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}">POSNAS</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/dashboard') }}">POS</a>
      </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>

        <li class="dropdown">
            <a href="{{ url('/dashboard') }}" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i><span>User</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('/permission') }}"><span>Permission Role</span></a></li>
            <li><a class="nav-link" href="{{ url('/user') }}"><span>Role User</span></a></li>
            <li><a class="nav-link" href="{{ url('/organization') }}"><span>Organization</span></a></li>
            <li><a class="nav-link" href="{{ url('/user') }}"><span>Users</span></a></li>
            </ul>
        </li>

        <li class="menu-header">Agenda</li>

        <li class="dropdown">
            <a href="{{ url('/all-activity') }}" class="nav-link "><i class="fas fa-th-list"></i><span>Agenda</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Cetak</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('activity.timeline') }}"><span>Jadwal Kegiatan</span></a></li>
            <li><a class="nav-link" href="{{ route('activity.report') }}"><span>Laporan Kegiatan</span></a></li>
            </ul>
        </li>

    </ul>

    </aside>
  </div>
