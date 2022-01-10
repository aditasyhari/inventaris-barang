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
                <li class="breadcrumb-item">Detail</li>
                <li class="breadcrumb-item active">Persetujuan</li>
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

                <h6 class="text-capitalize">{{ $p->user->role }}</h6><hr>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input class="form-control text-uppercase" type="text" id="" value="{{ $p->persetujuan }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Nik / Nis</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="" value="{{ $p->user->nik_nis }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="" value="{{ $p->user->profile->nama }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="kelas" placeholder="masukkan kelas" value="{{ $p->kelas }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Masukkan mapel" name="mapel" value="{{ $p->mapel }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Jam Ke</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Jam pelajaran ke-" name="jam" value="{{ $p->jam }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="datetime-local" format-value="DD-MM-YYY HH:mm" name="tgl_pinjam" id="tgl_pinjam" value="{{ $p->tgl_pinjam }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tanggal Kembali (Maksimal)</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="datetime-local" format-value="DD-MM-YYY HH:mm" name="tgl_kembali" id="tgl_kembali" value="{{ $p->tgl_kembali }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder=". . . ." readonly>{{ $p->keterangan }}</textarea>
                    </div>
                </div>
                <hr>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Barang</label>
                    <div class="col-sm-10">
                        <table class="table table-bordered table-striped" id="tabel-barang">
                            <thead>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Pinjam</th>
                            </thead>
                            <tbody id="tbody">
                                @foreach($p->peminjaman_barang as $pb)
                                <tr>
                                    <td>{{ $pb->barang->kode }}</td>
                                    <td>{{ $pb->barang->nama }}</td>
                                    <td>{{ $pb->jumlah }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if($p->persetujuan == 'pending')
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="d-flex flex-row">
                            <form action="{{ url('/peminjaman/persetujuan/setuju/'.$p->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-primary">Setujui</button>
                            </form>
                            <form action="{{ url('/peminjaman/persetujuan/tolak/'.$p->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger ml-2">Tolak</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@section('js')
<script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/pages/peminjaman/peminjaman.js') }}"></script>
@endsection