<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/stmik.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Data Kelas</title>

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
                            <p> Data Kelas</p>
                        </div>
                        <div class="ml-auto">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="/dashboard/kelas">Dashboard</a></li>
                                <li class="breadcrumb-item active">Data Kelas</li>
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
                        <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModal">
                            Tambah Data Kelas
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
                                    <th> Kode Kelas</th>
                                    <th> Matakuliah </th>
                                    <th> Kode Matakuliah </th>
                                    <th> Dosen Pengampu </th>
                                    <th> Kode Dosen </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; ?>
                                @foreach ($kelas as $data)
                                <tr>
                                    <td> {{ $id++ }} </td>
                                    <td> {{ $data->kode_kelas }} </td>
                                    <td> {{ $data->nama_mk}} </td>
                                    <td> {{ $data->kode_mk}} </td>
                                    <td> {{ $data->nama_dosen}} </td>
                                    <td> {{ $data->kode_dosen}} </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDataModal{{$data->kode_kelas}}"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalKelas{{$data->kode_kelas}}"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Hapus -->
                @foreach ($kelas as $data)
                <div class="modal fade" id="deleteModalKelas{{$data->kode_kelas}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalKelasLabel{{$data->kode_kelas}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalKelasLabel{{$data->kode_kelas}}">Delete Confirmation</h5>
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
                                <form action="/kelas/delete/{{$data->kode_kelas}}" method="POST" class="d-inline">
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
                @foreach ($kelas as $data)
                <div class="modal fade" id="editDataModal{{$data->kode_kelas}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel{{$data->kode_kelas}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/kelas/update/{{$data->kode_kelas }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editDataModalLabel{{$data->kode_kelas}}">Edit Data Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Kelas</label>
                                        <input name="kode_kelas" type="text" class="form-control" value="{{ old('kode_kelas', $data->kode_kelas) }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Matakuliah </label>
                                        <select id="nama_mk_edit" name="nama_mk" class="form-control select-nama-mk" data-kode-kelas="{{$data->kode_kelas}}" data-nama-mk="{{ old('nama_mk', $data->nama_mk) }}" required>
                                            <<option value="">Pilih Matakuliah</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kode Matakuliah</label>
                                        <input id="kode_mk_edit_{{$data->kode_kelas}}" name="kode_mk" type="text" class="form-control" value="{{ old('kode_mk', $data->kode_mk) }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Dosen </label>
                                        <select name="nama_dosen" id="nama_dosen_edit" class="form-control select-nama-dosen" data-kode-kelas="{{$data->kode_kelas}}" data-nama-dosen="{{ old('nama_dosen', $data->nama_dosen) }}" required>
                                            <<option value="">Pilih Dosen</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Dosen</label>
                                        <input id="kode_dosen_edit_{{$data->kode_kelas}}" name="kode_dosen" type="text" class="form-control" value="{{ old('kode_dosen', $data->kode_dosen) }}" required readonly>
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
                <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/kelas/tambahdata" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Kelas</label>
                                        <input name="kode_kelas" type="text" class="form-control" required>
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
                                        <label>Pilih Dosen </label>
                                        <select name="nama_dosen" class="form-control" id="nama_dosen" required>
                                            <<option value="">Pilih Dosen</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Dosen</label>
                                        <input id="kode_dosen" name="kode_dosen" type="text" class="form-control" required readonly>
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
                var kodeKelas = selectElement.data('kode-kelas');
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
                            $('#kode_mk_edit_' + kodeKelas).val(response.kode_mk);
                        },
                        error: function(error) {
                            console.error('Error fetching kode matakuliah:', error);
                        }
                    });
                });
            });
        });
    </script>

    <!-- Untuk Auto field dosen -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/getdosen', // Change this URL to your actual route for fetching dosen data
                method: 'GET',
                success: function(response) {
                    var options = '';
                    response.dosen.forEach(function(namaDosen) {
                        options += '<option value="' + namaDosen + '">' + namaDosen + '</option>';
                    });
                    $('#nama_dosen').append(options);
                },
                error: function(error) {
                    console.error('Error fetching dosen:', error);
                }
            });

            $('#nama_dosen').change(function() {
                var selectedNamaDosen = $(this).val();
                $.ajax({
                    url: '/getkodedosen',
                    method: 'GET',
                    data: {
                        nama_dosen: selectedNamaDosen
                    },
                    success: function(response) {
                        $('#kode_dosen').val(response.kode_dosen);
                    },
                    error: function(error) {
                        console.error('Error fetching kode dosen:', error);
                    }
                });
            });

            $('.select-nama-dosen').each(function() {
                var selectElement = $(this);
                var kodeKelas = selectElement.data('kode-kelas');
                var oldSelectedValue = selectElement.data('nama-dosen'); // Get the old selected value

                $.ajax({
                    url: '/getdosen',
                    method: 'GET',
                    success: function(response) {
                        var options = '';
                        response.dosen.forEach(function(namaDosen) {
                            var isSelected = (namaDosen == oldSelectedValue) ? 'selected' : ''; // Check if the option matches old value
                            options += '<option value="' + namaDosen + '" ' + isSelected + '>' + namaDosen + '</option>';
                        });
                        selectElement.append(options); // Append options to this select element
                    },
                    error: function(error) {
                        console.error('Error fetching dosen:', error);
                    }
                });

                selectElement.change(function() {
                    var selectedNamaDosen = $(this).val();
                    $.ajax({
                        url: '/getkodedosen',
                        method: 'GET',
                        data: {
                            nama_dosen: selectedNamaDosen
                        },
                        success: function(response) {
                            // Use the ID based on kodeKelas to update the corresponding input
                            $('#kode_dosen_edit_' + kodeKelas).val(response.kode_dosen);
                        },
                        error: function(error) {
                            console.error('Error fetching kode dosen:', error);
                        }
                    });
                });
            });

        });
    </script>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/getmahasiswa', // Change this URL to your actual route for fetching mahasiswa data
                method: 'GET',
                success: function(response) {
                    var options = '';
                    response.mahasiswa.forEach(function(mhs) {
                        options += '<option value="' + mhs + '">' + mhs + '</option>';
                    });
                    $('#nama_mhs').append(options);
                },
                error: function(error) {
                    console.error('Error fetching mahasiswa:', error);
                }
            });

            $('#nama_mhs').change(function() {
                var selectedNamaMhs = $(this).val();
                $.ajax({
                    url: '/getnim',
                    method: 'GET',
                    data: {
                        nama_mhs: selectedNamaMhs
                    },
                    success: function(response) {
                        $('#nim').val(response.nim);
                    },
                    error: function(error) {
                        console.error('Error fetching nim:', error);
                    }
                });
            });

            $('.select-nama-mhs').each(function() {
                var selectElement = $(this);
                var kodeKelas = selectElement.data('kode-kelas');
                var oldSelectedValue = selectElement.data('nama-mhs'); // Get the old selected value

                $.ajax({
                    url: '/getmahasiswa',
                    method: 'GET',
                    success: function(response) {
                        var options = '';
                        response.mahasiswa.forEach(function(namaMhs) {
                            var isSelected = (namaMhs == oldSelectedValue) ? 'selected' : ''; // Check if the option matches old value
                            options += '<option value="' + namaMhs + '" ' + isSelected + '>' + namaMhs + '</option>';
                        });
                        selectElement.append(options); // Append options to this select element
                    },
                    error: function(error) {
                        console.error('Error fetching Mahasiswa:', error);
                    }
                });

                selectElement.change(function() {
                    var selectedNim = $(this).val();
                    $.ajax({
                        url: '/getnim',
                        method: 'GET',
                        data: {
                            nama_mhs: selectedNim
                        },
                        success: function(response) {
                            // Use the ID based on kodeKelas to update the corresponding input
                            $('#nim_edit_' + kodeKelas).val(response.nim);
                        },
                        error: function(error) {
                            console.error('Error fetching nim:', error);
                        }
                    });
                });
            });


        });
    </script>


</body>

</html>