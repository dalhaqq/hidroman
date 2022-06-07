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
                    <h2 class="card-title">Persediaan Barang</h2>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap text-center">
                            <thead>
                                <tr>
                                    <!-- Menurutku, ga perlu ada id. Karna petani ga butuh id kayanya -->
                                    <!-- <th class="border-top-0">Id Barang</th> -->
                                    <th class="border-top-0">Jenis Barang</th>
                                    <th class="border-top-0">Nama Barang</th>
                                    <th class="border-top-0">Stok</th>
                                    <!-- atribut Status itu diisi pake logic aja, ga perlu ada di db. If this.id gully ga ada di kloter tanaman, maka status kosong (bisa diisi tanaman). Else statusnya isi -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($inventory as $i)
                                <tr>
                                    <td>{{ ucwords($i->jenis) }}</td>
                                    <td>{{ ucwords($i->jenis) }} {{ $i->barang }}</td>
                                    <td class="px-0">
                                        <!-- If stok == 0, maka bg-danger text-light. Else bg-light text-success -->
                                        @if($i->stok == 0)
                                        <div class="btn shadow-sm bg-danger text-light px-5" style='width:60%;'>0 buah</div>
                                        @else
                                        <div class="btn shadow-sm bg-light text-success px-5" style='width:60%;'>{{ $i->stok }} buah</div>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    Tidak ada data
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