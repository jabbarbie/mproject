'use strict'
import page from './info.js'

var data = {
    labels  : ['Fauzi', 'Jabbar', 'Apri', 'Surya', 'Randy', 'Daindra', 'Faisal'],
    datasets: [
    {
        label               : 'Realisasi',
        backgroundColor     : '#007bff',
        borderColor         : '#007bff',
        data                : [1, 1, 2, 4, 0, 0, 4]
    },
    {
        label               : 'Target',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        data                : [2, 2, 4, 4, 2, 2, 2]
    },
    ]
}
var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }
var mode      = 'index'
var intersect = true

const ab = function() {
    var ctx = document.getElementById('barChart').getContext('2d');
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            maintainAspectRatio: false,
            tooltips           : {
                mode     : mode,
                intersect: intersect
              },
            hover              : {
                mode     : mode,
                intersect: intersect
            },
            responsive: true,


            // jika ingin mengatur padding
            // layout: {
            //     padding: {
            //         left: 0,
            //         right: 0,
            //         top: 0,
            //         bottom: 0
            //     }
            // },
            title: {
                display: false,
                text: 'Cabang Surabaya',
                fontSize: 15,
                position: 'topleft'
            },

            // legend untuk keterangan target / realisasi
            legend: {
                display: false,
                position: 'right',
                labels: {
                    boxWidth : 15,
                    // fontColor: 'rgb(255, 99, 132)',
                    fontSize: 11
                },
            },
            //
            // scale yAxes - xAxes
            scales: {
                yAxes: [{
                    gridLines: {
                        display      : true,
                        lineWidth    : '4px',
                        color        : 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                      },
                      ticks: $.extend({
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return (parseInt(value) === value) ? value : '';
                        }
                        // Include a dollar sign in the ticks
                        // callback: function (value, index, values) {
                        //   if (value >= 1000) {
                        //     value /= 1000
                        //     value += 'k'
                        //   }
                        //   return '$' + value
                        // }
                      }, ticksStyle)
                    // ticks: {
                    //     // Include a dollar sign in the ticks
                    //     callback: function(value, index, values) {
                    //         return (parseInt(value) === value) ? value : '';
                    //     }
                    // }

                }],
                xAxes: [{
                    display  : true,
                    gridLines: {
                      display: false
                    },
                    ticks    : ticksStyle
                }],
            }
        }
    });

}; 

// ini untuk update
// function updateConfigAsNewObject(chart) {
//     chart.options = {
//         responsive: true,
//         title:{
//             display:true,
//             text: 'Chart.js'
//         },
//         scales: {
//             xAxes: [{
//                 display: true
//             }],
//             yAxes: [{
//                 display: true
//             }]
//         }
//     }
//     chart.update();
// }
    /**
     * Bar Chart
     */
    // var barChartCanvas = $('#barChart').get(0).getContext('2d')
    // var barChartData = jQuery.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0

    // var barChartOptions = {
    //   responsive              : true,
    //   maintainAspectRatio     : false,
    //   datasetFill             : false
    // }

    // var barChart = new Chart(barChartCanvas, {
    //   type: 'bar', 
    //   data: barChartData,
    //   options: barChartOptions
    // })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    // var stackedBarChartCanvas = $('#barChart').get(0).getContext('2d')
    // var stackedBarChartData = jQuery.extend(true, {}, areaChartData)

    // var stackedBarChartOptions = {
    //   responsive              : true,
    //   maintainAspectRatio     : false,
    //   scales: {
    //     xAxes: [{
    //       stacked: true,
    //     }],
    //     yAxes: [{
    //       stacked: true
    //     }]
    //   }
    // }

    // var stackedBarChart = new Chart(stackedBarChartCanvas, {
    //   type: 'bar', 
    //   data: stackedBarChartData,
    //   options: stackedBarChartOptions
    // })

function sate()
{
    console.log("sate");
    
}
async function index()
{
    // await info()
    document.getElementById("kotak1").onload = ab()
    // ab().ctx.update({
    //     duration: 800,
    //     easing: 'easeOutBounce'
    // })
    
}
// -------------------------- //
if (page.currentPage == 'dashboard')
{
    // export default info
    index()
}