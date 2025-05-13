<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('assets/img/logo/logo.png') }}" alt="" /></a>
            <strong><a href="index.html"><img src="{{ asset('assets/img/logo/logosn.png') }}"
                        alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="active">
                        <a class="has-arrow" href="index.html">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Manajemen Karyawan</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Daftar Karyawan" href="{{ route('karyawan.index') }}"><span
                                        class="mini-sub-pro">Daftar
                                        Karyawan</span></a></li>
                            <li><a title="Kontrak Kerja" href="{{ route('kontrak-kerja.index') }}"><span
                                        class="mini-sub-pro">Kontrak
                                        Kerja</span></a></li>
                            <li><a title="Data Resign" href="{{ route('data-resign.index') }}"><span
                                        class="mini-sub-pro">Data
                                        Resign</span></a></li>
                            <li><a title="Data Pelatihan" href="{{ route('data-pelatihan.index') }}"><span
                                        class="mini-sub-pro">Data
                                        Pelatihan</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span
                                class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                            <span class="mini-click-non">Absensi & Cuti</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All Professors" href="all-professors.html"><span
                                        class="mini-sub-pro">Absensi</span></a></li>
                            <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Cuti
                                    </span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
