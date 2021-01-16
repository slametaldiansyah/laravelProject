<script>
    // Radialize the colors

function handleData(responseData) {

Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart

$('#container').highcharts({
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
            text: 'Role Access'
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
            data: responseData
        }]
    });

}

$(document).ready(function() {
     $.ajax({
        url: '{{ url('role-chart') }}',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            handleData(data);
        }
      });
  });

</script>
