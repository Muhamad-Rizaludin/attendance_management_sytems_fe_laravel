<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/stmik.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
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
                            <p>Presensi</p>
                        </div>
                        <div class="ml-auto">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Presensi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="isicontent">

                <div class="container">
                    @if(session('success'))
                    <div class="alert alert-success alert-dimissible m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{(session('success'))}}.
                    </div>
                    @endif
                    @if(session('warning'))
                    <div class="alert alert-warning alert-dimissible m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation"></i></i> Warning!</h5>
                        {{(session('warning'))}}.
                    </div>
                    @endif

                    <div class="row d-flex justify-content-center align-items-center">
                        <div class=" col-md-4">
                            <div class="accordion" id="classAccordion">
                                <div class="card">
                                    <div class="card-header" id="classHeader">
                                        <button class="btn btn-link text-center" type="button" data-toggle="collapse" data-target="#classInfo" aria-expanded="true" aria-controls="classInfo">
                                            <h5 class="mb-0 text-dark text-center">
                                                Informasi Kelas
                                            </h5>
                                        </button>
                                    </div>
                                    <div id="classInfo" class="collapse" aria-labelledby="classHeader" data-parent="#classAccordion">
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>Kode Jadwal:</strong> <span class="float-right">{{ $jadwalkelas->kd_jadwal }}</span></li>
                                            <li class="list-group-item"><strong>Kode Kelas:</strong> <span class="float-right">{{ $jadwalkelas->kode_kelas }}</span></li>
                                            <li class="list-group-item"><strong>Nama Matakuliah:</strong> <span class="float-right">{{ $jadwalkelas->nama_mk }}</span></li>
                                            <li class="list-group-item"><strong>Kode Matakuliah:</strong> <span class="float-right">{{ $jadwalkelas->kode_mk }}</span></li>
                                            <li class="list-group-item"><strong>Wajib SKS:</strong> <span class="float-right">{{ $jadwalkelas->wajib_sks }}</span></li>
                                            <li class="list-group-item"><strong>Tanggal:</strong> <span class="float-right">{{ now()->format('Y-m-d') }}</span></li>
                                            <li class="list-group-item"><strong>Mulai:</strong> <span class="float-right">{{ \Carbon\Carbon::parse($jadwalkelas->mulai)->format('H:i') }}</span></li>
                                            <li class="list-group-item"><strong>Selesai:</strong> <span class="float-right">{{ \Carbon\Carbon::parse($jadwalkelas->selesai)->format('H:i') }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="accordion" id="classAccordionMhs">
                                <div class="card">
                                    <div class="card-header" id="classHeaderMhs">
                                        <button class="btn btn-link text-center" type="button" data-toggle="collapse" data-target="#classInfoMhs" aria-expanded="true" aria-controls="classInfoMhs">
                                            <h5 class="mb-0 text-dark">
                                                Informasi Mahasiswa
                                            </h5>
                                        </button>
                                    </div>
                                    <div id="classInfoMhs" class="collapse" aria-labelledby="classHeaderMhs" data-parent="#classAccordionMhs">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>NIM</th>
                                                    <th>Matakuliah</th>
                                                    <th>Kode Matakuliah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id = 1; ?>
                                                @foreach ($mahasiswa as $mhs)
                                                <tr>
                                                    <td> {{ $id++ }} </td>
                                                    <td> {{ $mhs->nama_mhs}} </td>
                                                    <td> {{ $mhs->nim}} </td>
                                                    <td> {{ $mhs->nama_mk}} </td>
                                                    <td> {{ $mhs->kode_mk}} </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <img id="video-player" class="embed-responsive-item" width="640" height="480" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="presensiForm" action="{{ route('tambahdata.presensi') }}" method="POST">
                        @csrf

                        <div class="row my-5">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <button class="btn btn-success" id="btn-start">Mulai</button>
                                        <button class="btn btn-danger" id="btn-stop" disabled>Selesai</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" type="submit" id="btn-save">Simpan Data Presensi</button>
                                    </div>
                                </div>
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Status</th>
                                            <th>Waktu Presensi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body"></tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark col-sm-16">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('template')}}/dist/js/demo.js"></script>

    <!-- DataTables -->
    <script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.jss"></script>
    <script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        let mahasiswaData = @json($mahasiswa);
        let date = @json($date);
        let formattedDate = '';
        if (date !== null) {
            formattedDate = date.split(' ')[0];
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Get CSRF token
        let intervalId;

        $(document).ready(function() {
            const form = document.getElementById('presensiForm');
            const btnStart = $("#btn-start");
            const btnStop = $("#btn-stop");
            const btnSave = $("#btn-save");
            const videoPlayer = $("#video-player");
            const tableBody = $("#table-body");
            let isVideoFeedPending = true;

            let fetchedData = JSON.parse(localStorage.getItem("detectionData")) || [];
            btnStop.prop("disabled", true);
            btnSave.prop("disabled", true);

            let isCapturingData = false;
            videoPlayer.attr("src", "{{asset('template')}}/dist/img/stop.svg");
            const currentTime = new Date().toISOString().split('T')[0];

            if (currentTime === formattedDate) {
                btnStart.prop("disabled", true); // Disable the "Start" button if the dates match
            } else {
                btnStart.prop("disabled", false); // Disable the "Start" button if the dates match
            }

            btnStart.on("click", function() {
                btnStop.prop("disabled", false);
                btnStart.prop("disabled", true);
                btnSave.prop("disabled", true);

                // Clear existing data from local storage
                localStorage.removeItem("detectionData");

                // Set the flag to indicate data capturing is active
                isCapturingData = true;

                // Set the image source to the video feed API
                videoPlayer.attr("src", "http://127.0.0.1:5000/video_feed");
                isVideoFeedPending = false;

                // Set a timeout to initiate data fetching after a delay
                setTimeout(function() {
                    console.log('two', isVideoFeedPending)
                    if (!isVideoFeedPending && isCapturingData) {
                        fetchDetectionResults();
                        intervalId = setInterval(fetchDetectionResults, 100);
                    }
                }, 10000);
                console.log('first', isVideoFeedPending)
            });

            btnStop.on("click", function() {
                btnStart.prop("disabled", false);
                btnStop.prop("disabled", true);
                btnSave.prop("disabled", false);

                // Clear the image source
                videoPlayer.attr("src", "{{asset('template')}}/dist/img/stop.svg");
                clearInterval(intervalId);
                isVideoFeedPending = true;

                // Set the flag to indicate data capturing is stopped
                isCapturingData = false;

                updateTableForTidakHadir();
            });

            function fetchDetectionResults() {
                $.ajax({
                    url: "http://127.0.0.1:5000/detection_results_json",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        fetchedData = [{
                            class_name: '',
                            timestamp: ''
                        }]
                        const newData = data.filter((entry) => {
                            return !fetchedData.some(
                                (item) =>
                                item.class_name === entry.class_name &&
                                item.timestamp === entry.timestamp
                            );
                        });
                        updateTable(newData);
                    },
                    error: function(error) {
                        console.error("Error fetching detection results:", error);
                    },
                });
            }


            function updateTable(newData) {
                newData.forEach((entry) => {
                    const matchingMahasiswa = mahasiswaData.find(mhs => mhs.nim === entry.class_name);
                    if (matchingMahasiswa && !isEntryAlreadyInTable(matchingMahasiswa.nim)) {
                        const row = $("<tr>");
                        const nimCell = $("<td>").text(matchingMahasiswa.nim);
                        const namaMhsCell = $("<td>").text(matchingMahasiswa.nama_mhs);
                        const namaMkCell = $("<td>").text(matchingMahasiswa.nama_mk);
                        const statusCell = $("<td>").text("Hadir");
                        const timestampCell = $("<td>").text(entry.timestamp);

                        row.append(nimCell);
                        row.append(namaMhsCell);
                        row.append(namaMkCell);
                        row.append(statusCell);
                        row.append(timestampCell);

                        tableBody.append(row);
                        fetchedData.push(entry);
                    }
                });

                localStorage.setItem("detectionData", JSON.stringify(fetchedData));
            }

            function isEntryAlreadyInTable(nim, timestamp) {
                return tableBody.find(`tr:has(td:contains('${nim}'))`).length > 0;
            }

            function updateTableForTidakHadir() {
                mahasiswaData.forEach((mhs) => {
                    if (!isEntryAlreadyInTable(mhs.nim)) {
                        const row = $("<tr>");
                        const nimCell = $("<td>").text(mhs.nim);
                        const namaMhsCell = $("<td>").text(mhs.nama_mhs);
                        const namaMkCell = $("<td>").text(mhs.nama_mk);
                        const statusCell = $("<td>").text("Tidak Hadir"); // Set "Tidak Hadir" status
                        const timestampCell = $("<td>").text(""); // Empty timestamp for undetected students

                        row.append(nimCell);
                        row.append(namaMhsCell);
                        row.append(namaMkCell);
                        row.append(statusCell);
                        row.append(timestampCell);

                        tableBody.append(row);
                    }
                });
            }

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally
                btnStart.prop("disabled", true);
                btnStop.prop("disabled", true);

                const tableRows = tableBody.find("tr");
                const dataToSubmit = [];

                tableRows.each(function(index, row) {
                    const cells = $(row).find("td");
                    const rowData = {
                        nim: $(cells[0]).text(),
                        nama_mhs: $(cells[1]).text(),
                        nama_mk: $(cells[2]).text(),
                        status: $(cells[3]).text(),
                        waktu_absen: $(cells[4]).text() || null
                    };
                    dataToSubmit.push(rowData);
                });

                // Clear the table body
                tableBody.empty();

                // Create hidden input field to send JSON data
                const jsonDataInput = document.createElement('input');
                jsonDataInput.type = 'hidden';
                jsonDataInput.name = 'presensi_data';
                jsonDataInput.value = JSON.stringify(dataToSubmit);
                form.appendChild(jsonDataInput);

                // Clear existing data from local storage
                localStorage.removeItem("detectionData");

                // Submit the form
                form.submit();
            });

        });
    </script>


</body>

</html>