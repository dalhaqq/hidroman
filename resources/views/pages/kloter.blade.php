@extends('layouts.template')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Kloter</h2>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap text-center">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Nomor Kloter</th>
                                    <th class="border-top-0">Gully</th>
                                    <th class="border-top-0">Jenis Tanaman</th>
                                    <th class="border-top-0">Tanggal Tanam</th>
                                    <th class="border-top-0">Tanggal Cabut</th>
                                    <th class="border-top-0">Total Nutrisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kloter as $k)
                                <tr>
                                    <td>{{$k->id}}</td>
                                    <td>{{$k->gully->nama ?? ''}}</td>
                                    <td>{{$k->benih->barang}}</td>
                                    <td>{{$k->tgl_tanam}}</td>
                                    <td>{{$k->tgl_akhir}}</td>
                                    <td>{{$k->jml_nutrisi}} ml</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<!-- ============================================================== -->
@endsection