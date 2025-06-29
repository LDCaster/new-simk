<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="/dashboard"><img class="main-logo" src="{{ asset('assets/img/logo/logo.png') }}" alt="" /></a>
            <strong><a href="/dashboard"><img src="{{ asset('assets/img/logo/logosn.png') }}"
                        alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">

                    <li>
                        <a href="/dashboard" aria-expanded="false">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>

                    {{-- Manajemen Karyawan: Hanya Super Admin & HRD --}}
                    @if (in_array(Auth::user()->role, ['super admin', 'hrd']))
                        <li class="active">
                            <a class="has-arrow" href="#">
                                <span class="educate-icon educate-form icon-wrap"></span>
                                <span class="mini-click-non">Manajemen Karyawan</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Daftar Karyawan" href="{{ route('karyawan.index') }}"><span
                                            class="mini-sub-pro">Daftar Karyawan</span></a></li>
                                <li><a title="Kontrak Kerja" href="{{ route('kontrak-kerja.index') }}"><span
                                            class="mini-sub-pro">Kontrak Kerja</span></a></li>
                                <li><a title="Data Resign" href="{{ route('data-resign.index') }}"><span
                                            class="mini-sub-pro">Data Resign</span></a></li>
                                <li><a title="Data Pelatihan" href="{{ route('data-pelatihan.index') }}"><span
                                            class="mini-sub-pro">Data Pelatihan</span></a></li>
                                <li><a title="Data Users" href="{{ route('users.index') }}"><span
                                            class="mini-sub-pro">Data Users</span></a></li>
                            </ul>
                        </li>
                    @endif

                    {{-- Training Plan: Semua Role --}}
                    <li>
                        <a href="{{ route('training-plans.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                            <span class="mini-click-non">Training Plan</span>
                        </a>
                    </li>

                    {{-- Absensi & Cuti --}}
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                            <span class="mini-click-non">Absensi & Cuti</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            {{-- Absensi: Hanya Super Admin --}}
                            <li><a title="Absensi" href="{{ route('absensi.index') }}"><span
                                        class="mini-sub-pro">Absensi</span></a></li>

                            {{-- Cuti: Semua Bisa --}}
                            <li><a title="Cuti" href="{{ route('cuti.index') }}"><span
                                        class="mini-sub-pro">Cuti</span></a></li>
                        </ul>
                    </li>

                    {{-- Laporan & Statistik: Semua Role --}}
                    <li>
                        <a href="{{ route('laporan-statistik.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-charts icon-wrap"></span>
                            <span class="mini-click-non">Laporan & Statistik</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
