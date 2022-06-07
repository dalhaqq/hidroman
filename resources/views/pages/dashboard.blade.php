@extends('layouts.template')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Gully Countdown -->
    <!-- NOTE: Ini widget buat petani bisa liat countdown dari setiap gully -->
    <!-- ============================================================== -->

    <div class="row">
        @foreach($filledGully as $fg)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $fg->nama }}</h4>
                    <div class="text-end">
                        <h2 class="font-light mb-0"><i class="me-2 ti-arrow-up text-success"></i>{{ $fg->countdown }} hari</h2>
                        <span class="text-muted">Menuju penambahan nutrisi berikutnya</span>
                    </div>
                    @switch($fg->countdown)
                        @case(3)
                        <span class="text-success">0%</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%; height: 6px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @break
                        @case(2)
                        <span class="text-success">33%</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 33%; height: 6px;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @break
                        @case(1)
                        <span class="text-success">67%</span>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 67%; height: 6px;" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @break
                        @default
                        <span class="text-success">100%</span>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @break
                    @endswitch
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- ============================================================== -->
    <!-- End Gully Countdown -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Grafik Panen -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Grafik Panen</h4>
                    <div class="flot-chart">
                        <div class="flot-chart-content " id="flot-line-chart" style="padding: 0px; position: relative;">
                            <canvas class="flot-base w-100" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
    <!-- ============================================================== -->
    <!-- End Grafik Panen -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
@push('scripts')
<script>
    /*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
  "use strict";
  // ==============================================================
  // Newsletter
  // ==============================================================

  var offset = 0;
  plot();
  
  
  function plot() {
      $.getJSON("/panen/json", function(data){
          var plotObj = $.plot(
              $("#flot-line-chart"),
              data,
      {
          xaxes: [{
            mode: "time",
            timeformat: "%d/%m/%y",
            tickSize: [1, "day"],
            color: "black",        
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
        }],
        legend: {
            noColumns: 0,
            labelFormatter: function (label, series) {
                return "<font color=\"white\">" + label + "</font>";
            },
            backgroundColor: "#000",
            backgroundOpacity: 0.9,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: true,
            borderWidth: 3,
            mouseActiveRadius: 50,
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] },
            axisMargin: 20
        }
    }
    );
    function showTooltip(x, y, contents) {
          $('<div id="tooltip">' + contents + '</div>').css({
              position: 'absolute',
              display: 'none',
              top: y + 5,
              left: x + 5,
              border: '1px solid #fdd',
              padding: '2px',
              'background-color': '#fee'
          }).appendTo("body").fadeIn(200);
      }
      var previousPoint = null;
      $("#flot-line-chart").bind("plothover", function (event, pos, item) {
          if (item) {
              if (previousPoint != item.dataIndex) {
                  previousPoint = item.dataIndex;
    
                  $("#tooltip").remove();
                  console.log(item);
                  var x = item.datapoint[1].toFixed(0),
                  jenis = item.series.label;
    
                  showTooltip(item.pageX, item.pageY, `<strong>${jenis}</strong><br>${x}gr`);
              }
          }
          else {
              $("#tooltip").remove();
              previousPoint = null;
          }
      });
});
}
});

</script>
@endpush