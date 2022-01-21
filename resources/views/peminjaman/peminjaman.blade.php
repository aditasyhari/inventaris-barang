@extends('layouts.main')

@section('title') Peminjaman @endsection

@section('css')
<link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Peminjaman Barang</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Peminjaman</li>
                <li class="breadcrumb-item active">List Peminjaman</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
@if (Auth::user()->role == 'teknisi')
    @include('peminjaman.peminjaman-teknisi')   
@else
    @include('peminjaman.peminjaman-anggota')
@endif
@endsection

@section('js')
<script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/pages/peminjaman/peminjaman.js') }}"></script>

<script>
    var now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    document.getElementById('tgl_pinjam').value = now.toISOString().slice(0,16);

    var future = new Date();
    @if (Auth::user()->role == 'guru')
        future.setDate(future.getDate() + 7);
        future.setMinutes(future.getMinutes() - future.getTimezoneOffset());
        document.getElementById('tgl_kembali').value = future.toISOString().slice(0,16);
    @else
        future.setDate(future.getDate() + 2);
        future.setMinutes(future.getMinutes() - future.getTimezoneOffset());
        document.getElementById('tgl_kembali').value = future.toISOString().slice(0,16);
    @endif
</script>
@endsection