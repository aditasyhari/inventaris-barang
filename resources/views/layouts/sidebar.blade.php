<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ url('/dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i><span> Beranda </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/data-barang') }}" class="waves-effect">
                        <i class="mdi mdi-view-list"></i><span> Data barang </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/peminjaman') }}" class="waves-effect">
                        <i class="mdi mdi-book-open"></i><span> Peminjaman </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/history') }}" class="waves-effect">
                        <i class="mdi mdi-history"></i><span> History </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/laporan') }}" class="waves-effect">
                        <i class="mdi mdi-file-chart"></i><span> Laporan </span>
                    </a>
                </li>
                <br>
                <!-- <li class="menu-title">Pengaturan</li> -->
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-box"></i><span> Data User </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/data-user/teknisi') }}">Teknisi</a></li>
                        <li><a href="{{ url('/data-user/guru') }}">Guru</a></li>
                        <li><a href="{{ url('/data-user/siswa') }}">Siswa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/peminjaman/durasi-pinjam') }}" class="waves-effect">
                        <i class="mdi mdi-timer-sand-full"></i><span> Durasi Pinjam </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>