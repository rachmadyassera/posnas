<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}">LEPAT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/dashboard') }}">LPT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>

            <li class="dropdown">
                <a href="{{ url('/dashboard') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>

            <li
                class="nav-item dropdown @if (Request::segment(1) == 'permission') active
                    @elseif(Request::segment(1) == 'role') active
                    @elseif(Request::segment(1) == 'organization') active
                    @elseif(Request::segment(1) == 'user') active
                    @else @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-users-cog"></i><span>User</span></a>
                <ul class="dropdown-menu">
                    <li @if (Request::segment(1) == 'permission') class="active" @endif> <a class="nav-link"
                            href="{{ url('/permission') }}"><span>Permission Role</span></a></li>
                    <li @if (Request::segment(1) == 'role') class="active" @endif><a class="nav-link"
                            href="{{ url('/role') }}"><span>Role User</span></a></li>
                    <li @if (Request::segment(1) == 'organization') class="active" @endif><a class="nav-link"
                            href="{{ url('/organization') }}"><span>Organization</span></a></li>
                    <li @if (Request::segment(1) == 'user') class="active" @endif><a class="nav-link"
                            href="{{ url('/user') }}"><span>Users</span></a></li>
                </ul>
            </li>

            <li class="menu-header">Agenda</li>

            <li @if (Request::segment(1) == 'all-activity') class="active" @endif>
                <a href="{{ url('/all-activity') }}" class="nav-link"><i
                        class="fas fa-th-list"></i><span>Agenda</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i>
                    <span>Export</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('activity.search') }}"><span>Jadwal Kegiatan</span></a>
                    </li>
                    <li><a class="nav-link" href="{{ route('activity.report') }}"><span>Laporan Kegiatan</span></a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
