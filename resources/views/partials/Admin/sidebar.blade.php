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

            <li @if (Request::segment(1) == 'operator') class="active" @endif>
                <a href="{{ url('/operator') }}" class="nav-link "><i
                        class="fas fa-user-tie"></i><span>Operator</span></a>
            </li>

            <li class="menu-header">Umum</li>

            <li
                class="nav-item dropdown
                    @if (Request::segment(1) == 'activity') active
                    @else @endif">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i
                        class="fas fa-calendar-alt"></i> <span>Agenda</span></a>
                <ul class="dropdown-menu">
                    <li @if (Request::segment(1) == 'activity' && empty(Request::segment(2))) class="active" @endif><a class="nav-link"
                            href="{{ url('activity') }}"><span>Data Kegiatan</span></a></li>
                    <li @if (Request::segment(2) == 'export') class="active" @endif><a class="nav-link"
                            href="{{ route('activity.search') }}"><span>Export Kegiatan</span></a></li>
                    <li @if (Request::segment(2) == 'report') class="active" @endif><a class="nav-link"
                            href="{{ route('activity.report') }}"><span>Export Laporan</span></a></li>
                </ul>
            </li>

            <li
                class="nav-item dropdown
                    @if (Request::segment(1) == 'location') active
                    @elseif(Request::segment(1) == 'confrence') active
                    @else @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-map-marker-alt"></i><span>Presensi</span></a>
                <ul class="dropdown-menu">
                    <li @if (Request::segment(1) == 'location') class="active" @endif>
                        <a href="{{ url('location') }}" class="nav-link "><span>Lokasi</span></a>
                    </li>

                    <li @if (Request::segment(1) == 'confrence') class="active" @endif>
                        <a href="{{ url('confrence') }}" class="nav-link "><span>Data Presensi</span></a>
                    </li>
                </ul>
            </li>

            {{-- <li class="menu-header">Inventaris Barang</li>

            <li class="dropdown">
                <a href="{{ url('/activity') }}" class="nav-link "><i class="fas fa-calendar-alt"></i><span>Agenda</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Cetak</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('activity.timeline') }}"><span>Jadwal Kegiatan</span></a></li>
                <li><a class="nav-link" href="{{ route('activity.report') }}"><span>Laporan Kegiatan</span></a></li>
                </ul>
            </li> --}}
        </ul>

    </aside>
</div>
