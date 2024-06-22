@extends('temp.v_temp')
@section('breadcump','Setting Kelas')
@section('title','Setting Kelas')
@section('isicontent')

<div class="card">
    <div class="card-header">
        <!-- Add button to open the modal -->
        <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModal">
            Tambah Kelas
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
                    <th> Tanggal</th>
                    <th> Matakuliah </th>
                    <th> Mulai </th>
                    <th> Selesai </th>
                    <th> Dosen Pengampu </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1; ?>
                @foreach ($karyawan as $data)
                <tr>
                    <td> {{ $id++ }} </td>
                    <td> {{ $data->tanggal }} </td>
                    <td> {{ $data->matakuliah}} </td>
                    <td> {{ $data->mulai}} </td>
                    <td> {{ $data->selesai}} </td>
                    <td> {{ $data->dosen_pengampu}} </td>
                    <td>
                        <!-- <a href="/karyawan/detail/{{$data->id}}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a> -->
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDataModal{{$data->id}}"><i class="fas fa-edit"></i></button>
                        <form action="/karyawan/delete/{{$data->id}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini?')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/dashboard/createkar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Matakuliah</label>
                        <input name="matakuliah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <input name="mulai" type="time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Selesai</label>
                        <input name="selesai" type="time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Dosen Pengampu</label>
                        <input name="dosen_pengampu" class="form-control" required>
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

<!-- Modal Edit -->
@foreach ($karyawan as $data)
<div class="modal fade" id="editDataModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/karyawan/update/{{$data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel{{$data->id}}">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" value="{{ old('tanggal', $data->tanggal) }}">
                    </div>
                    <div class="form-group">
                        <label>Matakuliah</label>
                        <input name="matakuliah" type="text" class="form-control" value="{{ old('matakuliah', $data->matakuliah) }}">
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <input name="mulai" type="time" class="form-control" value="{{ old('mulai', $data->mulai) }}">
                    </div>
                    <div class="form-group">
                        <label>Selesai</label>
                        <input name="selesai" type="time" class="form-control" value="{{ old('selesai', $data->selesai) }}">
                    </div>
                    <div class="form-group">
                        <label>Dosen Pengampu</label>
                        <input name="dosen_pengampu" type="text" class="form-control" value="{{ old('dosen_pengampu', $data->dosen_pengampu) }}">
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

@endsection