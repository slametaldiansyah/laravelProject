<script>
    // Radialize the colors

function handleData3(responseData3) {
    $(function () {
            Highcharts.setOptions({
        lang: {
            thousandsSep: '',
        }
    });

$('#container3').highcharts({
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
            text: 'Position'
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
            data: responseData3
        }]
    });
});

}

$(document).ready(function() {
     $.ajax({
        url: '{{ url('position-chart') }}',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            handleData3(data);
        }
      });
  });

</script>
