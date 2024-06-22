@extends('temp.v_temp')
@section('breadcump','Home Karyawan')
@section('title', 'Home ')
@section('isicontent')
<div class="container-fluid">

  <div class="row">
    <div class="col-12 col-sm-6 col-md-3" onclick="window.location.href = '{{ route('dashboard.jadwalkuliahdosen') }}';" style="cursor: pointer;">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jadwal Kelas</span>
          <span class="info-box-number">
          {{ $count_data_kelas_dosen}}
            <small></small>
          </span>
        </div>
      </div>

    </div>

    <!-- <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data Jadwal kelas</span>
          <span class="info-box-number">10</span>
        </div>

      </div>

    </div> -->

  </div>

</div>

@endsection