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
                    <h2 class="card-title">Riwayat Pembelian</h2>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap text-center">
                            <thead>
                                <tr>
                                    <!-- Menurutku, id ga perlu dicantumin, ga akan kepake sama petaninya. Biasanya yang diliat itu tanggalnya, bukan idnya. Tapi kalau mau ditambahin, bolehh aja -->
                                    <!-- <th class="border-top-0">Id Pembelian</th> -->
                                    <th class="border-top-0">Tanggal</th>
                                    <th class="border-top-0">Nama Barang</th>
                                    <th class="border-top-0">Jumlah Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pembelian as $p)
                                <tr>
                                    <td>{{$p->tanggal}}</td>
                                    <td>{{ucfirst($p->inventory->jenis)}} {{$p->inventory->barang}}</td>
                                    <td>{{$p->jumlah}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Tidak ada data</td>
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