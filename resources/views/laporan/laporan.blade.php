@extends('layouts.main')

@section('title') Laporan @endsection

@section('css')
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Laporan Peminjaman Barang</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Laporan</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <form action="{{ url('/laporan') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Bulan</label>
                                    <select class="custom-select" name="bulan" required>
                                        <option selected disabled>Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <select class="custom-select" name="tahun" id="tahun" required>
                                        <option selected disabled>Pilih Tahun</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" style="margin-top: 30px;">Lihat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($lp = Session::get('laporan'))           
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3" id="cus-btn"></div>
                <table id="table-report" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Mapel</th>
                            <th>Tgl Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lp as $p)
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('js')
<script>
    const currentYear = new Date().getFullYear();
    var year;
    var selectTahun = document.getElementById("tahun");
    
    for(var i=0; i <= 4; i++) {
        var option = document.createElement("option");
        year =  currentYear - i;
        option.text = year;
        option.value = year;
        selectTahun.appendChild(option);
    }

    $(document).ready(function() {
        var tableLaporan = $('#table-report').DataTable( {
            buttons: [ 'excel', 'pdf', 'print' ]
        });
    
        tableLaporan.buttons().container().appendTo('#cus-btn');
    } );
</script>
@endsection