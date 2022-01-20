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
                <li class="breadcrumb-item active">Detail</li>
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

                @if(Auth::user()->role == 'teknisi')
                    @if($p->status_kembali == 'meminta')
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Bukti</label>
                        <div class="col-sm-10">
                            <a href="#" class="pop">
                                <img src="{{ asset('image/bukti/'.$p->foto_bukti) }}" alt="Foto Bukti" class="img-fluid" style="max-width: 400px">
                            </a>
                        </div>

                        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">							   
                                <div class="modal-content">         						      
                                    <div class="modal-body">
                                                                        
                                    <button type="button" class="close" data-dismiss="modal"><span 
                                    aria-hidden="true">&times;</span></button>						        
                                    <img src="" class="imagepreview" style="width: 100%;">
                                                                    
                                    </div>							    
                                </div>								   
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="d-flex flex-row">
                                <form action="{{ url('/pengembalian/'.$p->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-primary">Konfirmasi Pengembalian</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                    @if($p->status_kembali == 'belum')
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="d-flex flex-row">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kembalikan">
                                Kembalikan
                                </button>
                                
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="kembalikan" tabindex="-1" aria-labelledby="kembalikanLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="kembalikanLabel">Bukti Pengembalian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/history/kembalikan/'.$p->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm col-form-label">Bukti Pengembalian</label>
                                    <div class="col-sm">
                                        <input class="form-control" type="file" name="foto_bukti" accept="images/*" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Kembalikan</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>


                    @endif
                @endif

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@section('js')
<script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/pages/history/history.js') }}"></script>

<script>
   $(function() {
     $('.pop').on('click', function() {
       $('.imagepreview').attr('src',$(this).find('img').attr('src'));
       $('#imagemodal').modal('show');   
       });		
   });
</script>
@endsection