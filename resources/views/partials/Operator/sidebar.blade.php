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
            <li @if (Request::segment(1) == 'dashboard') class="active" @endif>
                <a href="{{ url('/dashboard') }}" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>

            <li
                class="nav-item dropdown
                    @if (Request::segment(1) == 'activity') active
                    @elseif(Request::segment(1) == 'my-activity') active
                    @elseif(Request::segment(1) == 'get-activity') active
                    @elseif(Request::segment(1) == 'report-activity') active
                    @else @endif">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i
                        class="fas fa-calendar-alt"></i> <span>Agenda</span></a>
                <ul class="dropdown-menu">
                    <li
                        @if (Request::segment(1) == 'my-activity') class="active"
                        @elseif(Request::segment(1) == 'activity'  && Request::segment(2) == 'my') class="active"
                        @elseif(Request::segment(1) == 'get-activity') class="active"
                        @elseif(Request::segment(2) == 'show') class="active"
                        @else @endif>
                        <a class="nav-link" href="{{ route('my.activity') }}"><span>Data Kegiatan</span></a>
                    </li>
                    <li @if (Request::segment(2) == 'export') class="active" @endif><a class="nav-link"
                            href="{{ route('activity.search') }}"><span>Export Kegiatan</span></a></li>
                    <li @if (Request::segment(2) == 'report') class="active" @endif><a class="nav-link"
                            href="{{ route('activity.report') }}"><span>Export Laporan</span></a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
