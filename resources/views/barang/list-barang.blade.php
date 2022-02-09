@extends('layouts.main')

@section('title') List Barang @endsection

@section('css')
<link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">List Barang</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Barang</li>
                <li class="breadcrumb-item active">List Barang</li>
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

                @if (Auth::user()->role == 'teknisi')
                    <a href="{{ url('/data-barang/tambah') }}" class="btn btn-primary mb-3">Tambah Barang</a>
                @endif

                @if ($message = Session::get('status'))
                    <div class="alert alert-primary alert-block mb-3">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <form action="{{ route('import-barang') }}" method="post" enctype="multipart/form-data">
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
                            <th>Kode</th>
                            <th width="10%">Foto</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Tersedia</th>
                            <th>Kondisi</th>
                            @if (Auth::user()->role == 'teknisi')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($barang as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->kode }}</td>
                            <td>
                                <img src="{{ asset('image/barang/'.$b->foto) }}" alt="Foto Barang" class="img-fluid" style="max-width: 100%;">
                            </td>
                            <td>{{ $b->nama }}</td>
                            <td>{{ $b->merk }}</td>
                            <td>Rp {{ number_format($b->harga, 0, '.', '.') }}</td>
                            <td>{{ $b->jumlah }}</td>
                            <td>{{ $b->tersedia }}</td>
                            <td>{{ $b->kondisi }}</td>
                            @if (Auth::user()->role == 'teknisi')
                            <td>
                                <a href="{{ url('/data-barang/edit/'.$b->id) }}" class="btn btn-success" title="Edit"><i class="mdi mdi-pencil"></i></a>
                                <button type="button" class="btn btn-danger sa-warning" data-id="{{ $b->id }}" title="Hapus"><i class="mdi mdi-delete"></i></button>
                            </td>
                            @endif
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
<script src="{{ asset('assets/pages/barang/sweet-alert.init.js') }}"></script>
@endsection