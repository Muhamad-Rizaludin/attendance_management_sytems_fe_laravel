<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/stmik.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login</title>

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


    <div class="row">
        <div class="container">
            <div class="col-md-4 d-flex justify-content-center" style="margin-top: 20rem;">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card card-header">
                            <h2>Login Form</h2>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Email </label>
                                <input name="email" type="email" class="form-control" value="{{old('email') }}" placeholder="dosen@gmail.com" required autofocus>
                                <div class="text-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password </label>
                                <input name="password" type="password" class="form-control" value="{{old('password') }}" required autofocus>
                                <div class="text-danger">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <div class="">
                                        <button class="btn btn-fill btn-primary btn-wd btn-sm">Login</button>
                                        <button type="reset" class="btn btn-fill btn-warning btn-wd btn-sm">Reset</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <img src="assets/img/bg_login.svg">
            </div>
        </div>

    </div>


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