@extends('layouts.main')

@section('title') Profile @endsection

@section('css')
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<h6>Ganti Password</h6>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
                @endif

                @if ($message = Session::get('status'))
                    <div class="alert alert-primary alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <form action="{{ url('/profile/ubah-profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            @if($user->profile->foto == null || $user->profile->foto == '')
                            <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="Foto Profile" class="img-fluid img-rounded" style="max-width: 200px">
                            @else
                            <img src="{{ asset('image/profile/'.$user->profile->foto) }}" alt="Foto Profile" class="img-fluid img-rounded" style="max-width: 200px">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ganti Foto</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" accept="images/*" name="foto" placeholder="masukkan foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama" value="{{ $user->profile->nama }}" placeholder="masukkan nama" id="example-text-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nik / Nis</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nik_nis" value="{{ $user->nik_nis }}" placeholder="masukkan nik / nis" id="example-text-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}" placeholder="contoh@gmail.com" id="example-email-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="no_telp" value="{{ $user->profile->no_telp }}" placeholder="masukkan no telp" id="example-text-input" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="aktif" id="example-text-input" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah Profile</button>
                        </div>
                    </div>
                </form>
                <hr>

                <form action="{{ url('/profile/ubah-password') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password_lama" placeholder="Password lama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" placeholder="Password baru">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password_confirmation" placeholder="konfirmasi password baru">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@section('js')
@endsection