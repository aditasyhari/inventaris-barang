@extends('layouts.main')

@section('title') Dashboard @endsection

@section('css')
<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Selamat Datang</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Grafik Barang</h4>

                <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ $total }}</h5>
                        <p class="text-muted">Jenis Barang</p>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ $tersedia }}</h5>
                        <p class="text-muted">Barang Tersedia</p>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ $dipinjam }}</h5>
                        <p class="text-muted">Barang Dipinjam</p>
                    </li>
                </ul>

                <div id="morris-line-example" class="morris-chart-height morris-charts"></div>

            </div>
        </div>
    </div>

</div>

 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <img src="{{ asset('image/smk-imud.png') }}" alt="welcome" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>

<script>
    !function ($) {
        "use strict";

        var MorrisCharts = function () {
        };

            //creates line chart
            MorrisCharts.prototype.createLineChart = function (element, data, xkey, ykeys, labels, lineColors) {
                Morris.Line({
                    element: element,
                    data: data,
                    xkey: xkey,
                    ykeys: ykeys,
                    labels: labels,
                    hideHover: 'auto',
                    gridLineColor: '#eef0f2',
                    resize: true, //defaulted to true
                    lineColors: lineColors,
                    lineWidth: 2
                });
            },

            MorrisCharts.prototype.init = function () {

                //create line chart
                var $data = [
                    {y: '2009', a: 50, b: 80, c: 20},
                    {y: '2010', a: 130, b: 100, c: 80},
                    {y: '2011', a: 80, b: 60, c: 70},
                    {y: '2012', a: 70, b: 200, c: 140},
                    {y: '2013', a: 180, b: 140, c: 150},
                    {y: '2014', a: 105, b: 100, c: 80},
                    {y: '2015', a: 250, b: 150, c: 200}
                ];
                this.createLineChart('morris-line-example', $data, 'y', ['a', 'b', 'c'], ['Jumlah', 'Tersedia', 'Dipinjam'], ['#ccc', '#35a989', '#ffe082']);

            },
            //init
            $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
    }(window.jQuery),

    //initializing 
        function ($) {
            "use strict";
            $.MorrisCharts.init();
        }(window.jQuery);
</script>
@endsection