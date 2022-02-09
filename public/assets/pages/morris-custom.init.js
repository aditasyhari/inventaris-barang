/*
 Template Name: Agroxa - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Morris chart Init
 */


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