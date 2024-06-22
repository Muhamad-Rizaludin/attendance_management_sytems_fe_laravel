@extends('temp.v_temp')
@section('breadcump','Data Kurikulum')
@section('title','Data Kurikulum')
@section('isicontent')

<div class="card">
    <div class="card-header">
        <!-- Add button to open the modal -->
        <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModalKurikulum">
            Tambah Data Kurikulum
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
                    <th> Kode Matakuliah</th>
                    <th> Nama Matakuliah</th>
                    <th> SKS</th>
                    <th> Semester</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1; ?>
                @foreach ($kurikulum as $data)
                <tr>
                    <td> {{ $id++ }} </td>
                    <td> {{ $data->kode_mk }} </td>
                    <td> {{ $data->nama_mk}} </td>
                    <td> {{ $data->sks}} </td>
                    <td> {{ $data->semester}} </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDataModalKurikulum{{$data->kode_mk}}"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalKurikulum{{$data->kode_mk}}"><i class="fas fa-trash-alt"></i></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Hapus -->
@foreach ($kurikulum as $data)
<div class="modal fade" id="deleteModalKurikulum{{$data->kode_mk}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalKurikulumLabel{{$data->kode_mk}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalKurikulumLabel{{$data->kode_mk}}">Delete Confirmation</h5>
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
                <form action="/kurikulum/delete/{{$data->kode_mk}}" method="POST" class="d-inline">
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
@foreach ($kurikulum as $data)
<div class="modal fade" id="editDataModalKurikulum{{$data->kode_mk}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalKurikulumLabel{{$data->kode_mk}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/kurikulum/update/{{$data->kode_mk}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalKurikulumLabel{{$data->kode_mk}}">Edit Data Kurikulum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Matakuliah</label>
                        <input name="kode_mk" class="form-control" value="{{ old('kode_mk', $data->kode_mk) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Matakuliah</label>
                        <input name="nama_mk" class="form-control" value="{{ old('nama_mk', $data->nama_mk) }}" required>
                    </div>
                    <div class="form-group">
                        <label>SKS</label>
                        <input name="sks" type="number" class="form-control" value="{{ old('sks', $data->sks) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input name="semester" type="number" class="form-control" value="{{ old('semester', $data->semester) }}" required>
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
<div class="modal fade" id="addDataModalKurikulum" tabindex="-1" role="dialog" aria-labelledby="addDataModalKurikulumLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/kurikulum/tambahkurikulum" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalKurikulumLabel">Tambah Data Kurikulum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Matakuliah</label>
                        <input name="kode_mk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Matakuliah</label>
                        <input name="nama_mk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>SKS</label>
                        <input name="sks" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input name="semester" class="form-control" required>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>


@endsection