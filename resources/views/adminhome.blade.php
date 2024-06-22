@extends('temp.v_temp')
@section('breadcump','Dashboard Admin')
@section('title', 'Dashboard ')
@section('isicontent')

<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3" onclick="window.location.href = '{{ route('dashboard.jadwalkuliah') }}';" style="cursor: pointer;">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data Kelas</span>
          <span class="info-box-number">
          {{ $count_data_kelas }}
            <small></small>
          </span>
        </div>
      </div>

    </div>

    <div class="col-12 col-sm-6 col-md-3"  onclick="window.location.href = '{{ route('dashboard.users') }}';" style="cursor: pointer;">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data User</span>
          <span class="info-box-number">{{ $count_data_user }}</span>
        </div>

      </div>

    </div>

  </div>
</div>
@endsection