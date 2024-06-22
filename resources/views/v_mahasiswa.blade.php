@extends('temp.v_temp')
@section('breadcump','Data Mahasiswa')
@section('title','Data Mahasiswa')
@section('isicontent')

<div class="card">
    <div class="card-header">
        <!-- Add button to open the modal -->
        <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModalMhs">
            Tambah Data Mahasiswa
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
                    <th> Nim</th>
                    <th> Nama</th>
                    <th> Prodi</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1; ?>
                @foreach ($mhs as $data)
                <tr>
                    <td> {{ $id++ }} </td>
                    <td> {{ $data->nim }} </td>
                    <td> {{ $data->nama_mhs}} </td>
                    <td> {{ $data->prodi}} </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDataModalMhs{{$data->nim}}"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalMhs{{$data->nim}}"><i class="fas fa-trash-alt"></i></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Hapus -->
@foreach ($mhs as $data)
<div class="modal fade" id="deleteModalMhs{{$data->nim}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalMhsLabel{{$data->nim}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalMhsLabel{{$data->nim}}">Delete Confirmation</h5>
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
                <form action="/mhs/delete/{{$data->nim}}" method="POST" class="d-inline">
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
@foreach ($mhs as $data)
<div class="modal fade" id="editDataModalMhs{{$data->nim}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalMhsLabel{{$data->nim}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/mhs/update/{{$data->nim }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalMhsLabel{{$data->nim}}">Edit Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nim</label>
                        <input name="nim" type="text" class="form-control" value="{{ old('nim', $data->nim) }}">
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input name="nama_mhs" type="text" class="form-control" value="{{ old('nama_mhs', $data->nama_mhs) }}">
                    </div>
                    <div class="form-group">
                        <label>Prodi</label>
                        <select name="prodi" class="form-control" value="{{ old('prodi', $data->prodi) }}" required>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
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
<div class="modal fade" id="addDataModalMhs" tabindex="-1" role="dialog" aria-labelledby="addDataModalMhsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/mhs/tambahmhs" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalMhsLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nim</label>
                        <input name="nim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input name="nama_mhs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Prodi </label>
                        <select name="prodi" class="form-control" required>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>

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