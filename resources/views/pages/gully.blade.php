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
                    <h2 class="card-title">Gully</h2>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap text-center">
                            <thead>
                                <tr>
                                    <!-- id gully diganti jadi nomor gully supaya petani ga kebingungan, apa itu id?. Tapi db nya ga usah diganti,ttep id aja -->
                                    <th class="border-top-0">Gully</th>
                                    <th class="border-top-0">Waktu Penyiraman</th>
                                    <th class="border-top-0">Status</th>
                                    <!-- atribut Status itu diisi pake logic aja, ga perlu ada di db. If this.id gully ga ada di kloter tanaman, maka status kosong (bisa diisi tanaman). Else statusnya isi -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($gully as $g)
                                <tr>
                                    <td>{{ $g->nama }}</td>
                                    <td>
                                        {{ $g->countdown }} hari
                                    </td>
                                    <td class=" px-0">
                                        <!-- If status isi, maka bg-success text-light. Else bg-light text-success -->
                                        @if($g->kloter)
                                        <div class="btn shadow-sm bg-success text-light px-5">Isi</div>
                                        @else
                                        <div class="btn shadow-sm bg-light text-success px-5">Kosong</div>
                                        @endif
                                    </td>
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