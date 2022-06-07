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
                    <h2 class="card-title">Riwayat Nutrisi</h2>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap text-center">
                            <thead>
                                <tr>
                                    <!-- Menurutku, id ga perlu dicantumin, ga akan kepake sama petaninya. Biasanya yang diliat itu tanggalnya, bukan idnya. Tapi kalau mau ditambahin, bolehh aja -->
                                    <th class="border-top-0">Tanggal Pemberian Nutrisi</th>
                                    <th class="border-top-0">Gully</th>
                                    <th class="border-top-0">Jenis Nutrisi</th>
                                    <th class="border-top-0">Jumlah Nutrisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($riwayatNutrisi as $rn)
                                <tr>
                                    <td>{{ $rn->tanggal }}</td>
                                    <td>{{ $rn->gully->nama }}</td>
                                    <td>{{ $rn->nutrisi->barang }}</td>
                                    <td>{{ $rn->jml_nutrisi }}ml</td>
                                </tr>
                                @empty
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