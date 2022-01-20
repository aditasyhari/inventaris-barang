@extends('layouts.main')

@section('title') Edit Barang @endsection

@section('css')
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit Barang</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Barang</li>
                <li class="breadcrumb-item active">Edit</li>
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

                <form action="{{ url('/data-barang/update/'.$b->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kode" placeholder="masukkan kode barang" id="" value="{{ $b->kode }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Nama barang" name="nama" id="" value="{{ $b->nama }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Merk barang" name="merk" id="" value="{{ $b->merk }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kondisi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Kondisi barang" name="kondisi" id="" value="{{ $b->kondisi }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Harga (Rp)</label> 
                        <div class="col-sm-10">
                            <input class="form-control" type="number" placeholder="Harga barang" name="harga" id="" value="{{ $b->harga }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jumlah</label> 
                        <div class="col-sm-10">
                            <input class="form-control" type="number" placeholder="Jumlah barang" name="jumlah" id="" value="{{ $b->jumlah }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tersedia</label> 
                        <div class="col-sm-10">
                            <input class="form-control" type="number" placeholder="Tersedia barang" name="tersedia" id="" value="{{ $b->tersedia }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Boleh Bawa Pulang ?</label> 
                        <div class="col-sm-10">
                            <select name="bawa_pulang" id="" class="form-control" required>
                                <option value="0" {{ ($b->bawa_pulang) == 0 ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ ($b->bawa_pulang) == 1 ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Foto</label> 
                        <div class="col-sm-10">
                            <input class="form-control" type="file" placeholder="Foto barang" name="foto" accept="images/*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label> 
                        <div class="col-sm-10">
                            <img src="{{ asset('image/barang/'.$b->foto) }}" alt="Foto Barang" class="img-fluid" style="max-width: 200px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Update</button>
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