@extends('temp.v_temp')
@section('breadcump','Data Dosen')
@section('title','Data Dosen')
@section('isicontent')

<div class="card">
    <div class="card-header">
        <!-- Add button to open the modal -->
        <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModalDosen">
            Tambah Dosen
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
                    <th> Kode Dosen</th>
                    <th> Nama Dosen </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1; ?>
                @foreach ($dosen as $data)
                <tr>
                    <td> {{ $id++ }} </td>
                    <td> {{ $data->kode_dosen }} </td>
                    <td> {{ $data->nama_dosen}} </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDataModalDosen{{$data->kode_dosen}}"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$data->kode_dosen}}"><i class="fas fa-trash-alt"></i></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Hapus -->
@foreach ($dosen as $data)
<div class="modal fade" id="deleteModal{{$data->kode_dosen}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$data->kode_dosen}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{$data->kode_dosen}}">Delete Confirmation</h5>
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
                <form action="/dosen/delete/{{$data->kode_dosen}}" method="POST" class="d-inline">
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
@foreach ($dosen as $data)
<div class="modal fade" id="editDataModalDosen{{$data->kode_dosen}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalDosenLabel{{$data->kode_dosen}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/dosen/update/{{$data->kode_dosen }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalDosenLabel{{$data->kode_dosen}}">Edit Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Dosen</label>
                        <input name="kode_dosen" type="text" class="form-control" value="{{ old('kode_dosen', $data->kode_dosen) }}">
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input name="nama_dosen" type="text" class="form-control" value="{{ old('nama_dosen', $data->nama_dosen) }}">
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
<div class="modal fade" id="addDataModalDosen" tabindex="-1" role="dialog" aria-labelledby="addDataModalDosenLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/dosen/tambahdosen" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalDosenLabel">Tambah Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Dosen</label>
                        <input name="kode_dosen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input name="nama_dosen" class="form-control" required>

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