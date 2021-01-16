<script>
    // Radialize the colors

function handleData2(responseData2) {
    $(function () {
            Highcharts.setOptions({
        lang: {
            thousandsSep: '',
        }
    });

    // Radialize the colors
    // Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
    //     return {
    //         radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
    //         stops: [
    //             [0, color],
    //             [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
    //         ]
    //     };
    // });

// Highcharts.setOptions({
//     colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
//         return {
//             radialGradient: {
//                 cx: 0.5,
//                 cy: 0.3,
//                 r: 0.7
//             },
//             stops: [
//                 [0, color],
//                 [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
//             ]
//         };
//     })
// });

// Build the chart
// Highcharts.chart('container2', {
//     chart: {
//         plotBackgroundColor: null,
//         plotBorderWidth: null,
//         plotShadow: false,
//         type: 'pie'
//     },
//     title: {
//         text: 'Application Access'
//     },
//     tooltip: {
//         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//     },
//     accessibility: {
//         point: {
//             valueSuffix: '%'
//         }
//     },
//     plotOptions: {
//         pie: {
//             allowPointSelect: true,
//             cursor: 'pointer',
//             dataLabels: {
//                 enabled: true,
//                 format: '<b>{point.name}</b>: {point.percentage:.1f} %',
//                 connectorColor: 'silver'
//             }
//         }
//     },
//     series: [{
//         name: 'total',
//         data: responseData2
//     }]
// });

$('#container2').highcharts({
        credits: {
            enabled: false
        },
        exporting: { enabled: true },
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Application Access'
        },
        tooltip: {
            pointFormat: '{series.name}:<b> {point.y} ({point.percentage:.1f}%) </b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ({point.percentage:.1f}%)',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'grey'
                    },
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Total',
            data: responseData2
        }]
    });
});

}

$(document).ready(function() {
     $.ajax({
        url: '{{ url('app-chart') }}',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            handleData2(data);
        }
      });
  });

</script>
