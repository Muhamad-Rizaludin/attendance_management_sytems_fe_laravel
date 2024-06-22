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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!--Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


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
                            <p>Laporan Presensi</p>
                        </div>
                        <div class="ml-auto">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Laporan Presensi</li>
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
                        <!-- <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModalJadwal">
                            Tambah Data Jadwal Perkuliahan
                        </button> -->
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="filterMatakuliah">Pilih Matakuliah : </label>
                            </div>
                            <div class="col-md-2" style="margin-left: -70px;">
                                <select id="filterMatakuliah" class="form-control">
                                    <option value="">Semua Matakuliah</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> No</th>
                                    <th> nim</th>
                                    <th> Nama Mahasiswa</th>
                                    <th> Nama Matakuliah</th>
                                    <th> Status</th>
                                    <th> Waktu Presensi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; ?>
                                @foreach ($presensi as $data)
                                <tr>
                                    <td> {{ $id++ }} </td>
                                    <td> {{ $data->nim }} </td>
                                    <td> {{ $data->nama_mhs}} </td>
                                    <td> {{ $data->nama_mk }} </td>
                                    <td> {{ $data->status }} </td>
                                    <td> {{ $data->waktu_absen}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


    <script>
        $(document).ready(function() {
            var table = $("#example1").DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    className: 'btn btn-success bg-success mb-1',
                    text: ' <i class="fas fa-download"></i> Unduh',
                    filename: 'laporan_presensi',
                    title: 'Laporan Presensi Mahasiswa',
                }, ],
                "responsive": true,
                "autoWidth": false,
                "paging": true,

            });

            // Handle the select element's change event
            $('#filterMatakuliah').on('change', function() {
                var filterValue = $(this).val();
                table.column(3).search(filterValue).draw();
            });

            $.ajax({
                url: '/getmatkul', // for add modal Change this URL to your actual route for fetching matakuliah data
                method: 'GET',
                success: function(response) {
                    var options = '';
                    response.matakuliah.forEach(function(namaMk) {
                        options += '<option value="' + namaMk + '">' + namaMk + '</option>';
                    });
                    $('#filterMatakuliah').append(options);
                },
                error: function(error) {
                    console.error('Error fetching matakuliah:', error);
                }
            });
        });
    </script>



</body>

</html>