@extends('layouts.main')

@section('title') Tambah Barang @endsection

@section('css')
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Tambah Barang</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Barang</li>
                <li class="breadcrumb-item active">Tambah</li>
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

                <form action="{{ url('/data-barang/tambah') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kode" placeholder="masukkan kode barang" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Nama barang" name="nama" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Merk barang" name="merk" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kondisi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Kondisi barang" name="kondisi" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Harga (Rp)</label> 
                        <div class="col-sm-10">
                            <input class="form-control" type="number" placeholder="Harga barang" name="harga" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jumlah</label> 
                        <div class="col-sm-10">
                            <input class="form-control" type="number" placeholder="Jumlah barang" name="jumlah" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Boleh Bawa Pulang ?</label> 
                        <div class="col-sm-10">
                            <select name="bawa_pulang" id="" class="form-control" required>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Foto</label> 
                        <div class="col-sm-10">
                            <input class="form-control" type="file" placeholder="Foto barang" name="foto" accept="images/*" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambah</button>
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