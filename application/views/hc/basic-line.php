<?php?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highstock Example</title>

		<script src="<?=base_url()?>js/jquery.min.js"></script>
		
		<script type="text/javascript">
$(function () {

    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data) {
        // Create the chart
        $('#container').highcharts('StockChart', {


            rangeSelector : {
                selected : 1
            },

            title : {
                text : 'AAPL Stock Price'
            },

            series : [{
                name : 'AAPL',
                data : data,
                tooltip: {
                    valueDecimals: 2
                }
            }]
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

<div id="container" style="height: 400px; min-width: 310px"></div>
	</body>
</html>


