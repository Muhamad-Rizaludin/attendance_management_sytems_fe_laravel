<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/stmik.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('template')}}https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('template')}}https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link">Sistem Presensi Mahasiswa</a>
                </li>
            </ul>

            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a class="d-block col-sm-2" href="/dashboard/myprofile">
                        {{Auth::user()->name}}
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <i class="fas fa-sign-out-alt"><a href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();">
                                {{ __('Log out') }}
                            </a></i>

                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-6">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="{{asset('template')}}/dist/img/stmik.png" class="brand-image img-circle elevation-6" style="opacity: .9">
                <span class="brand-text">Presensi Mahasiswa</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->

                <!-- Sidebar Menu -->
                <!-- /.sidebar-menu -->
                @include('temp.v_nav')
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <p> Data Jadwal Perkuliahan</p>
                        </div>
                        <div class="ml-auto">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Data Jadwal Perkuliahan</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="isicontent">
                <div class="card">
                    <div class="card-header">
                        <!-- Add button to open the modal -->
                        <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModalJadwal">
                            Tambah Data Jadwal Perkuliahan
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <br>
                        @if(session('pesan'))
                        <div class="alert alert-success alert-dimissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{(session('pesan'))}}.
                        </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Kode Jadwal</th>
                                    <th> Kode Kelas</th>
                                    <th> Nama Matakuliah</th>
                                    <th> Kode Matakuliah</th>
                                    <th> Wajib SKS</th>
                                    <th> Tanggal</th>
                                    <th> Mulai</th>
                                    <th> Selesai</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; ?>
                                @foreach ($jadwal as $data)
                                <tr>
                                    <td> {{ $id++ }} </td>
                                    <td> {{ $data->kd_jadwal }} </td>
                                    <td> {{ $data->kode_kelas}} </td>
                                    <td> {{ $data->nama_mk }} </td>
                                    <td> {{ $data->kode_mk }} </td>
                                    <td> {{ $data->wajib_sks}} </td>
                                    <td> {{ $data->tanggal}} </td>
                                    <td> {{ \Carbon\Carbon::parse($data->mulai)->format('H:i')}} </td>
                                    <td> {{ \Carbon\Carbon::parse($data->selesai)->format('H:i')}} </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDataModalJadwal{{$data->kd_jadwal}}"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalJadwal{{$data->kd_jadwal}}"><i class="fas fa-trash-alt"></i></button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Modal Hapus -->
                @foreach ($jadwal as $data)
                <div class="modal fade" id="deleteModalJadwal{{$data->kd_jadwal}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalJadwalLabel{{$data->kd_jadwal}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalJadwalLabel{{$data->kd_jadwal}}">Delete Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Yakin Menghapus Data Ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <!-- Form for the Delete action -->
                                <form action="/jadwal/delete/{{$data->kd_jadwal}}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


                <!-- Modal Edit -->
                @foreach ($jadwal as $data)
                <div class="modal fade" id="editDataModalJadwal{{$data->kd_jadwal}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalJadwalLabel{{$data->kode_mk}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/jadwal/update/{{$data->kd_jadwal}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editDataModalJadwalLabel{{$data->kd_jadwal}}">Edit Data Perkuliahan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Jadwal</label>
                                        <input name="kd_jadwal" class="form-control" value="{{ old('kd_jadwal', $data->kd_jadwal) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Kode Kelas</label>
                                        <select name="kode_kelas" class="form-control select-kode-kelas" data-kode-jadwal="{{$data->kd_jadwal}}" data-kode-kelas="{{ old('kode_kelas', $data->kode_kelas) }}" required>
                                            <option value="">Pilih Kode Kelas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Matakuliah</label>
                                        <select id="nama_mk_edit_{{$data->kd_jadwal}}" name="nama_mk" class="form-control select-nama-mk" data-kode-jadwal="{{$data->kd_jadwal}}" data-nama-mk="{{ old('nama_mk', $data->nama_mk) }}" required>
                                            <option value="">Pilih Matakuliah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Matakuliah</label>
                                        <input id="kode_mk_edit_{{$data->kd_jadwal}}" name="kode_mk" type="text" class="form-control" value="{{ old('kode_mk', $data->kode_mk) }}" required readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Wajib SKS</label>
                                        <input name="wajib_sks" class="form-control" value="{{ old('wajib_sks', $data->wajib_sks) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input name="tanggal" type="date" class="form-control" value="{{ old('tanggal', $data->tanggal) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mulai</label>
                                        <input name="mulai" type="time" class="form-control" value="{{ old('mulai', \Carbon\Carbon::parse($data->mulai)->format('H:i')) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Selesai</label>
                                        <input name="selesai" type="time" class="form-control" value="{{ old('selesai', \Carbon\Carbon::parse($data->selesai)->format('H:i')) }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach


                <!-- Modal Add-->
                <div class="modal fade" id="addDataModalJadwal" tabindex="-1" role="dialog" aria-labelledby="addDataModalJadwalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/jadwal/tambahjadwal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addDataModalJadwalLabel">Tambah Data Perkuliahan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Jadwal</label>
                                        <input name="kd_jadwal" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Kode Kelas </label>
                                        <select id="kode_kelas" name="kode_kelas" class="form-control" required>
                                            <<option value="">Pilih Kode Kelas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Matakuliah </label>
                                        <select id="nama_mk" name="nama_mk" class="form-control" required>
                                            <<option value="">Pilih Matakuliah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Matakuliah</label>
                                        <input id="kode_mk" name="kode_mk" type="text" class="form-control" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Wajib SKS</label>
                                        <input name="wajib_sks" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input name="tanggal" type="date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mulai</label>
                                        <input name="mulai" type="time" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Selesai</label>
                                            <input name="selesai" type="time" class="form-control" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark col-sm-16">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('template')}}/dist/js/demo.js"></script>

    <!-- DataTables -->
    <script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": true,
            });
        });
    </script>

    <!-- untuk autofiled matakuliah -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/getmatkuladmin', // for add modal Change this URL to your actual route for fetching matakuliah data
                method: 'GET',
                success: function(response) {
                    var options = '';
                    response.matakuliah.forEach(function(namaMk) {
                        options += '<option value="' + namaMk + '">' + namaMk + '</option>';
                    });
                    $('#nama_mk').append(options);
                },
                error: function(error) {
                    console.error('Error fetching matakuliah:', error);
                }
            });

            $('#nama_mk').change(function() {
                var selectedNamaMk = $(this).val();
                $.ajax({
                    url: '/getkodemk',
                    method: 'GET',
                    data: {
                        nama_mk: selectedNamaMk
                    },
                    success: function(response) {
                        $('#kode_mk').val(response.kode_mk);
                    },
                    error: function(error) {
                        console.error('Error fetching kode matakuliah:', error);
                    }
                });
            });

            $('.select-nama-mk').each(function() {
                var selectElement = $(this);
                var kodeJadwal = selectElement.data('kode-jadwal');
                var oldSelectedValue = selectElement.data('nama-mk'); // Get the old selected value

                $.ajax({
                    url: '/getmatkuladmin',
                    method: 'GET',
                    success: function(response) {
                        var options = '';
                        response.matakuliah.forEach(function(namaMk) {
                            var isSelected = (namaMk == oldSelectedValue) ? 'selected' : ''; // Check if the option matches old value
                            options += '<option value="' + namaMk + '" ' + isSelected + '>' + namaMk + '</option>';
                        });
                        selectElement.append(options); // Append options to this select element
                    },
                    error: function(error) {
                        console.error('Error fetching matakuliah:', error);
                    }
                });

                selectElement.change(function() {
                    var selectedNamaMk = $(this).val();
                    $.ajax({
                        url: '/getkodemk',
                        method: 'GET',
                        data: {
                            nama_mk: selectedNamaMk
                        },
                        success: function(response) {
                            // Use the ID based on kodeJadwal to update the corresponding input
                            $('#kode_mk_edit_' + kodeJadwal).val(response.kode_mk);
                        },
                        error: function(error) {
                            console.error('Error fetching kode matakuliah:', error);
                        }
                    });
                });
            });

        });
    </script>

    <!-- untuk autofiled Kode Kelas -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/getkelas', // for add modal Change this URL to your actual route for fetching matakuliah data
                method: 'GET',
                success: function(response) {
                    var options = '';
                    response.kelas.forEach(function(kodeKelas) {
                        options += '<option value="' + kodeKelas + '">' + kodeKelas + '</option>';
                    });
                    $('#kode_kelas').append(options);
                },
                error: function(error) {
                    console.error('Error fetching kelas:', error);
                }
            });

            $('.select-kode-kelas').each(function() {
                var selectElement = $(this);
                var kodeJadwal = selectElement.data('kode-jadwal');
                var oldSelectedValue = selectElement.data('kode-kelas'); // Get the old selected value

                $.ajax({
                    url: '/getkelas',
                    method: 'GET',
                    success: function(response) {
                        var options = '';
                        response.kelas.forEach(function(kodeKelas) {
                            var isSelected = (kodeKelas == oldSelectedValue) ? 'selected' : ''; // Check if the option matches old value
                            options += '<option value="' + kodeKelas + '" ' + isSelected + '>' + kodeKelas + '</option>';
                        });
                        selectElement.append(options); // Append options to this select element
                    },
                    error: function(error) {
                        console.error('Error fetching kode kelas:', error);
                    }
                });
            });

        });
    </script>



</body>

</html>