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

                <form action="{{ url('/peminjaman/anggota/pinjam') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nik / Nis</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="{{ Auth::user()->nik_nis }}" id="" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="barang" required>
                                <option selected disabled>Pilih Kelas</option>
                                <option value="10">Kelas 10</option>
                                <option value="11">Kelas 11</option>
                                <option value="12">Kelas 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Masukkan mapel" name="mapel" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jam Ke</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Jam pelajaran ke-" name="jam" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="datetime-local" format-value="DD-MM-YYY HH:mm" name="tgl_pinjam" id="tgl_pinjam" readonly required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Kembali (Maksimal)</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="datetime-local" format-value="DD-MM-YYY HH:mm" name="tgl_kembali" id="tgl_kembali" readonly required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder=". . . ." required></textarea>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Barang</label>
                        <div class="col-sm-6">
                            <select class="custom-select" id="barang" required>
                                <option selected disabled>Pilih Barang</option>
                                @foreach($barang as $b)
                                <option value="['{{ $b->id }}', '{{ $b->kode }}', '{{ $b->nama }}', '{{ $b->tersedia }}']">{{ $b->nama }} - tersedia ({{ $b->tersedia }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="d-flex flex-row">
                                <input type="number" class="form-control mr-4" id="jumlah" min="1" placeholder="jumlah" required>
                                <button type="button" class="btn btn-success" onclick="tambah()"><i class="mdi mdi-plus"></i></button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <table class="table table-bordered table-striped" id="tabel-barang">
                                <thead>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Pinjam</th>
                                </thead>
                                <tbody id="tbody">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Pinjam</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->