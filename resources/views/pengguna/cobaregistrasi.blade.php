<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/stmik.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Registrasi</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="image-container set-full-height" style="background-image: url('assets/img/stimik.jpg')">
            <!--   Creative Tim Branding   -->
            <div class="logo-container">
                <div class="logo">
                    <img src="assets/img/stmik.png">
                </div>
                <div class="brand">
                    STMIK Bandung
                </div>
            </div>
            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="orange">

                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                    <h3>
                                        <b>STMIK </b> <b> Bandung </b><br>
                                        <small>Sistem Informasi Pengelolaan jobdesk dan daily report </small>
                                    </h3>
                                </div>

                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a data-toggle="tab">form Registrasi</a></li>
                                    </ul>
                                </div>

                                <div class="row">
                                    <div class="tab-content">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nama </label>
                                                <input name="name" type="text" class="form-control" class="@error('name') is-invalid @enderror" value="{{old('name') }}" placeholder="Geryy SKom" required autofocus>
                                                <div class="text-danger">
                                                    @error('name')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Email </label>
                                                <input name="email" type="email" class="form-control" value="{{old('email') }}" placeholder="gerry@gmail.com" required>
                                                <div class="text-danger">
                                                    @error('email')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Password </label>
                                                <input name="password" type="password" class="form-control" value="{{old('password') }}" required autocomplete="new-password">
                                                <div class="text-danger">
                                                    @error('password')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Konfirmasi Password </label>
                                                <input name="password_confirmation" type="password" class="form-control" value="{{old('password_confirmation') }}" required>
                                                <div class="text-danger">
                                                    @error('password_confirmation')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Id Karyawan </label>
                                                <input name="id_karyawan" type="text" class="form-control" value="{{old('id_karyawan') }}" required autocomplete="new-password">
                                                <div class="text-danger">
                                                    @error('id_karyawan')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Level </label>
                                                <select name="role_id" class="form-control" value="{{old('role_id') }}" required>
                                                    <option value="admin">Admin</option>
                                                    <option value="karyawan">Dosen</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="wizard-footer height-wizard">
                                                <div class="pull-right">
                                                    <button class="btn btn-fill btn-primary btn-wd btn-sm">Register</button>
                                                    <button type="reset" class="btn btn-fill btn-warning btn-wd btn-sm">Reset</button>
                                                </div>
                                                <a href="{{ route('login') }} " class="text-center">Sudah Mempunyai Akun</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- wizard container -->
                    </div>
                </div><!-- end row -->
            </div> <!--  big container -->

        </div>
    </form>
</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js"></script>

</html>