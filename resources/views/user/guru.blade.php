@extends('layouts.main')

@section('title') Data Guru @endsection

@section('css')
<link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">List Guru</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data User</li>
                <li class="breadcrumb-item active">Guru</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">

                @if ($message = Session::get('status'))
                    <div class="alert alert-primary alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <a href="{{ url('/data-user/tambah') }}" class="btn btn-primary mb-3">Tambah</a>
                <form action="{{ route('import-guru') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" required>
                        <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                    </div>
                </form>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($user as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $u->nik_nis }}</td>
                            <td>{{ $u->email }}</td>
                            <td class="text-capitalize">{{ $u->role }}</td>
                            <td>
                                <input data-id="{{$u->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" {{ $u->aktif ? 'checked' : '' }}>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger sa-warning" data-id="{{ $u->id }}" title="Hapus"><i class="mdi mdi-delete"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@section('js')
<script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-user/sweet-alert.init.js') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 

        $.ajax({
            type: "GET",
            dataType: "json",
            url: `{{ url('/data-user/ganti-status') }}`,
            data: {'aktif': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  });
</script>
@endsection