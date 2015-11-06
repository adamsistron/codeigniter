<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highstock Example</title>

		<script src="<?=base_url()?>js/jquery.min.js"></script>
		
		<script type="text/javascript">
$(function () {
    var seriesOptions = [],
        seriesCounter = 0,
        names = ['Programados', 'Despachados', 'Anulados'],
        // create the chart when all data is loaded
        createChart = function () {

            $('#container').highcharts('StockChart', {
               chart: {
                    // Edit chart spacing
                    spacingBottom: 30,
                    spacingTop: 20,
                    spacingLeft: 20,
                    spacingRight: 20,

                    // Explicitly tell the width and height of a chart
                    width: null,
                    height: '650'
                }, 
                credits: {
                            enabled: false
                        },
                //colors: ['#DF013A', '#2f7ed8', '#000'],
                colors: ['#000', '#2f7ed8', '#DF013A'],
                rangeSelector: {
                    selected: 1
                },
                title : {
                text : 'Cantidad de Despachos'
                },

                yAxis: {
                    labels: {
                        formatter: function () {
                            return (this.value > 0 ? ' + ' : '') + this.value + ' UTC';
                        }
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: 'silver'
                    }]
                },

                plotOptions: {
                    series: {
                        compare: 'sum'
                    }
                },

                tooltip: {
                    //pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',
                    valueDecimals: 0
                },

                series: seriesOptions
            });
        };

    $.each(names, function (i, name) {

        $.getJSON('<?=base_url()?>main/stockDatosCompareDespachos/' + name.toLowerCase(),    function (data) {

            seriesOptions[i] = {
                name: name,
                data: data,
                step: false
            };

            // As we're loading the data asynchronously, we don't know what order it will arrive. So
            // we keep a counter and create the chart when all the data is loaded.
            seriesCounter += 1;

            if (seriesCounter === names.length) {
                createChart();
            }
        });
    });
});
		</script>
	</head>
        <!-- Navbar -->
	<?=$this->load->view('headers/menu');?>
	<!-- End navbar -->
	<body>
<script src="<?=base_url()?>hc/stock/js/highstock.js"></script>
<script src="<?=base_url()?>hc/stock/js/modules/exporting.js"></script>


<div id="container" style="height: 600px; min-width: 310px"></div>
	</body>
</html>
