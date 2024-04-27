<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('admin.profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-university nav-icon"></i>
                    <p>
                        Akademik
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.jurusan.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jurusan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.program_study.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Program Studi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mata_kuliah.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Mata Kuliah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mahasiswa.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Mahasiswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tahun_akademik.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tahun Akademik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.krs.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>KRS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.input_nilai.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Input Nilai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.khs.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>KHS</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{ route('admin.transkrip_nilai.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cetak Transkrip</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dosen</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->