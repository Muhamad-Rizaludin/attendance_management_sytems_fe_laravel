@extends('temp.v_temp')
@section('breadcump','Data Jobdesk')
@section('title','Data Jobdesk')
@section('isicontent')

    <div class="card card-info">
        <div class="card-header">
            <a href="/dashboard/tambahjob" class="btn btn-sm btn-dark"> +Tambah Jobdesk</a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
         <div class="card-body">
            @if(session('pesan'))
            <div class="alert alert-success alert-dimissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{(session('pesan'))}}.
            </div>
            @endif
            <table id="example1" class = "table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kode Jobdesk</th>
                        <th> Nama Jobdesk</th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id=1; ?>
                    @foreach ($jobdesk as $data)
                        <tr>
                            <td> {{ $id++ }} </td>
                            <td> {{ $data->KodeJobdesk}} </td>
                            <td> {{ $data->NamaJobdesk}} </td>
                            <td> 
                                <form action="/jobdesk/edit/{{$data->id}}" class="d-inline">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="/jobdesk/delete/{{$data->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini ?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection