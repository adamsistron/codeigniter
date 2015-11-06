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
        names = ['Programados', 'Despachados', 'Diferencia'],
        //planta_distribucion = <?//=base_url()?>,
        // create the chart when all data is loaded
        createChart = function () {

            $('#grafico').highcharts('StockChart', {
                chart: {
                    // Edit chart spacing
                    spacingBottom: 30,
                    spacingTop: 20,
                    spacingLeft: 20,
                    spacingRight: 20,

                    // Explicitly tell the width and height of a chart
                    width: null,
                    height: '550'
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
                text : 'Volumen Despachado'
                },

                yAxis: {
                    labels: {
                        formatter: function () {
                            return (this.value > 0 ? ' + ' : '') + this.value + ' (Lts.)';
                        }
                    },
                    plotLines: [{
                        value: 0,
                        width: 4,
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
                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y} (Lts.)</b><br/>',
                    valueDecimals: 0
                },

                series: seriesOptions
            });
        };

    $.each(names, function (i, name) {

        $.getJSON('<?=base_url()?>main/stockDatosCompareVolumen/' + name.toLowerCase(),    function (data) {

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


<div id="container">
    
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <select id="distrito" class="form-control">
                <option>Distrito ...</option>
            </select>
        </div>
        
        <div class="col-md-3 ">
            <select id="estado" class="form-control">
                <option value="">Seleccione Estado...</option>
                
<?php
if ($estados != FALSE){
    foreach ($estados->result() as $row){
        echo "<option value='".$row->valor."'>".$row->llave."</option>";
        }
        }				
?>

            </select>
        </div>
        <div class="col-md-3 ">
            <select id="planta_distribucion" class="form-control">
                <option>Seleccione Planta de Distribución ...</option>
            </select>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-primary">Graficar</button>
            
        </div>
        
        <div id="log"></div>
    </div>
    <div class="row col-md-10 col-md-offset-1">
       <div id="grafico"></div>
    </div>
</div>
	</body>
</html>
