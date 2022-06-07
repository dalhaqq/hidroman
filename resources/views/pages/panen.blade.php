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
                    <h2 class="card-title">Riwayat Panen</h2>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap text-center">
                            <thead>
                                <tr>
                                    <!-- Menurutku, id ga perlu dicantumin, ga akan kepake sama petaninya. Biasanya yang diliat itu tanggalnya, bukan idnya. Tapi kalau mau ditambahin, bolehh aja -->
                                    <th class="border-top-0">Tanggal Panen</th>
                                    <th class="border-top-0">Nomor Kloter</th>
                                    <th class="border-top-0">Jenis Tanaman</th>
                                    <th class="border-top-0">Berat Hasil Panen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($riwayatPanen as $rp)
                                <tr>
                                    <td>{{ $rp->tanggal }}</td>
                                    <td>{{ $rp->kloter_id }}</td>
                                    <td>{{ $rp->kloter->benih->barang }}</td>
                                    <td>{{ $rp->jumlah }} gram</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Tidak ada data</td>
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