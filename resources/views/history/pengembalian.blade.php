@extends('layouts.main')

@section('title') Pengembalian @endsection

@section('css')
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">List Pengembalian</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Pengembalian</li>
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
                    <div class="alert alert-primary alert-block mb-3">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Mapel</th>
                            <th>Tgl Pinjam</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($peminjaman as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->user->profile->nama }}</td>
                            <td>{{ $p->kelas }}</td>
                            <td>{{ $p->mapel }}</td>
                            <td>{{ $p->tgl_pinjam }}</td>
                            <td>
                                @if($p->status_kembali == 'selesai')
                                <span class="badge badge-primary text-uppercase">Sudah Dikembalikan</span>
                                @elseif($p->status_kembali == 'belum')
                                <span class="badge badge-secondary text-uppercase">Belum Dikembalikan</span>
                                @elseif($p->status_kembali == 'meminta')
                                <span class="badge badge-success text-uppercase">Request Pengembalian</span>
                                @else
                                ----
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/pengembalian/detail/'.$p->id) }}" class="btn btn-info" title="Detail"><i class="mdi mdi-eye"></i></a>
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
@endsection