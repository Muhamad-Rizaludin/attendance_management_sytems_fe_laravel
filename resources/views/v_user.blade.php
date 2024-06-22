@extends('temp.v_temp')
@section('breadcump','Data User')
@section('title','Data User')
@section('isicontent')

<div class="card">
    <div class="card-header">
        <!-- Add button to open the modal -->
        <button type="button" class="btn btn-success btn btn-md" data-toggle="modal" data-target="#addDataModal">
            Tambah User
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
                    <th> Nama</th>
                    <th> Email</th>
                    <th> Kode Dosen</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1; ?>
                @foreach ($users as $data)
                <tr>
                    <td> {{ $id++ }} </td>
                    <td> {{ $data->name }} </td>
                    <td> {{ $data->email }} </td>
                    <td> {{ $data->kode_dosen }} </td>
                    <td>
                        <!-- <a href="/karyawan/detail/{{$data->id}}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a> -->
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDataModal{{$data->id}}"><i class="fas fa-edit"></i></button>
                        <form action="/user/delete/{{$data->id}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini?')">
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

<!-- Modal Edit -->
@foreach ($users as $data)
<div class="modal fade" id="editDataModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('user.update', $data->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel{{$data->id}}">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama </label>
                                <input name="name" type="text" class="form-control" value="{{ $data->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email </label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Password </label>
                                <input name="password" type="text" class="form-control"  required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Dosen </label>
                                <input name="kode_dosen" type="text" class="form-control" value="{{ $data->kode_dosen }}" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Add-->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('tambah.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama </label>
                                <input name="name" type="text" class="form-control"  value="{{old('name') }}" placeholder="Geryy SKom" required autofocus>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email </label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="gerry@gmail.com" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Password </label>
                                <input name="password" type="password" class="form-control" value="{{old('password') }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- <div class="col-sm-12">
                            <div class="form-group">
                                <label>Konfirmasi Password </label>
                                <input name="password_confirmation" type="password" class="form-control" value="{{old('password_confirmation') }}" required>
                            </div>
                        </div> -->

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Dosen </label>
                                <input name="kode_dosen" type="text" class="form-control" value="{{old('kode_dosen') }}" required>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection