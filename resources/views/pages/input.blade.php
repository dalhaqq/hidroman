@extends('layouts.template')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column Riwayat Pembelian -->
        <div class=" col-lg-4 col-xlg-9 col-md-7">
            <div class="card shadow">
                <div class="card-title text-center mt-3">
                    <h3>Tambah Riwayat Pembelian</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('pembelian') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                            <label for="tanggal">Tanggal Pembelian</label>
                        </div>
                        <div class="form-group">
                            <label for="inventory_id" class="col-sm-12">Nama Barang</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="inventory_id" name="inventory_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    @forelse($inventory as $i)
                                    <option value="{{ $i->id }}">{{ ucfirst($i->jenis) }} {{ $i->barang }}</option>
                                    @empty
                                    <option disabled>Belum ada data</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                            <label for="jumlah">Jumlah Barang</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Masukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Column Riwayat Pembelian -->
        <!-- Column Riwayat Nutrisi -->
        <div class=" col-lg-4 col-xlg-9 col-md-7">
            <div class="card shadow">
                <div class="card-title text-center mt-3">
                    <h3>Tambah Riwayat Nutrisi</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('/nutrisi') }}">
                    @csrf
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder=".">
                            <label for="tanggal">Tanggal Pemberian Nutrisi</label>
                        </div>
                        <div class="form-group">
                            <label for="gully_id" class="col-sm-12">Gully</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="gully_id" name="gully_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    @forelse($filledGully as $fg)
                                    <option value="{{ $fg->id }}">{{ $fg->nama }}</option>
                                    @empty
                                    <option disabled>Belum ada data</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nutrisi_id" class="col-sm-12">Jenis Nutrisi</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="nutrisi_id" name="nutrisi_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    @forelse($nutrisi as $n)
                                    <option value="{{ $n->id }}">{{ $n->barang }}</option>
                                    @empty
                                    <option disabled>Belum ada data</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="jml_nutrisi" name="jml_nutrisi">
                            <label for="jml_nutrisi">Jumlah Nutrisi</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Masukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Column Riwayat Nutrisi -->
        <!-- Column Riwayat Panen -->
        <div class=" col-lg-4 col-xlg-9 col-md-7">
            <div class="card shadow">
                <div class="card-title text-center mt-3">
                    <h3>Tambah Riwayat Panen</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('/panen') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                            <label for="tanggal">Tanggal Panen</label>
                        </div>
                        <div class="form-group">
                            <label for="kloter_id" class="col-sm-12">Nomor Kloter</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="kloter_id" name="kloter_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    @forelse($kloterAktif as $ka)
                                    <option value="{{ $ka->id }}">{{ $ka->id }}</option>
                                    @empty
                                    <option disabled>Belum ada data</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Cabut akar?</label>
                            <div class="form-check">
                                <input class="form-check-input" value="1" type="radio" name="cabut" id="cabut-ya">
                                <label class="form-check-label" for="cabut-ya">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="0" type="radio" name="cabut" id="cabut-tidak" checked>
                                <label class="form-check-label" for="cabut-tidak">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                            <label for="jumlah">Berat Hasil Panen</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Masukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Column Riwayat Panen -->
        <!-- Column Gully -->
        <div class=" col-lg-4 col-xlg-9 col-md-7">
            <div class="card shadow">
                <div class="card-title text-center mt-3">
                    <h3>Tambah Gully Baru</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('/gully') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" name="nama">
                            <label for="nama">Nama Gully</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Masukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Column Gully -->
        <!-- Kloter -->
        <div class=" col-lg-4 col-xlg-9 col-md-7">
            <div class="card shadow">
                <div class="card-title text-center mt-3">
                    <h3>Tambah Kloter Baru</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('/kloter') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_tanam" name="tgl_tanam">
                            <label for="tgl_tanam">Tanggal Tanam</label>
                        </div>
                        <div class="form-group">
                            <label for="gully_id" class="col-sm-12">Gully</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="gully_id" name="gully_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    @forelse($emptyGully as $eg)
                                    <option value="{{ $eg->id }}">{{ $eg->nama }}</option>
                                    @empty
                                    <option disabled>Belum ada data</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="benih_id" class="col-sm-12">Benih</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="benih_id" name="benih_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    @forelse($benih as $b)
                                        <option value="{{ $b->id }}">{{ $b->barang }}</option>
                                    @empty
                                    <option disabled>Belum ada data</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rockwool_id" class="col-sm-12">Rockwool</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="rockwool_id" name="rockwool_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    @forelse($rockwool as $r)
                                        <option value="{{ $r->id }}">{{ $r->barang }}</option>
                                    @empty
                                    <option disabled>Belum ada data</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Masukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Kloter -->
        <!-- Barang -->
        <div class=" col-lg-4 col-xlg-9 col-md-7">
            <div class="card shadow">
                <div class="card-title text-center mt-3">
                    <h3>Tambah Barang Baru</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('/inventory') }}">
                        @csrf
                        <div class="form-group">
                            <label for="jenis" class="col-sm-12">Jenis Barang</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="jenis" name="jenis" class="form-select shadow-none border-0 ps-0 form-control-line">
                                    <option value="benih">Benih</option>
                                    <option value="rockwool">Rockwool</option>
                                    <option value="nutrisi">Nutrisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="barang" class="col-sm-12">Nama Barang</label>
                            <div class="col-sm-12 border-bottom">
                                <input type="text" class="form-control" name="barang" id="barang">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Masukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Barang -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

@endsection