@extends('temp.v_temp')
@section('breadcump','My Profile')
@section('title', 'My Profile')
@section('isicontent')
<div class="card card-info">
    <br>
<div class="content col-sm-6 mx-auto">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 mx-auto">

            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama User</b> <a class="float-right">{{Auth::user()->name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email User</b> <a class="float-right">{{Auth::user()->email}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
</div>
@endsection