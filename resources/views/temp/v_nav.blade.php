<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

    <li class="nav-item">
      <a href="/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li>
    @if (Auth::user()->hasRole('admin'))
    <li class="nav-item">
      <a href="/dashboard/kelas" class="nav-link">
        <i class="nav-icon fas fa-chalkboard"></i>
        <p>Data Kelas</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/dosen" class="nav-link">
        <i class="nav-icon fas fa-bars"></i>
        <p>Data Dosen</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/mhs" class="nav-link">
        <i class="nav-icon fas fa-clipboard"></i>
        <p>Data Mahasiswa</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/kurikulum" class="nav-link">
        <i class="nav-icon fas fa-book-open"></i>
        <p>Data Kurikulum</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/settingmhs" class="nav-link">
        <i class="nav-icon fas fa-cog"></i>
        <p>Data Studi Mahasiswa</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/jadwalkuliah" class="nav-link">
        <i class="nav-icon fas fa-calendar"></i>
        <p>Data Jadwal Perkuliahan</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/user" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Data User</p>
      </a>
    </li>

    @endif

    @if (Auth::user()->hasRole('karyawan'))
    <!-- <li class="nav-item">
      <a href="/dashboard/user" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Data User</p>
      </a>
    </li> -->
    <li class="nav-item">
      <a href="/dashboard/jadwalkuliah/dosen" class="nav-link">
        <i class="nav-icon fas fa-clipboard"></i>
        <p>Jadwal Kelas</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/laporanpresensi" class="nav-link">
        <i class="nav-icon fas fa-clipboard"></i>
        <p>Laporan Presensi</p>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a href="/dashboard/dosen" class="nav-link">
        <i class="nav-icon fas fa-bars"></i>
        <p>Data Dosen</p>
      </a>
    </li> -->
    @endif

  </ul>
</nav>