<?php
require_once "../backend/class-conexion.php";
$conexion = new Conexion();
$sql="SELECT count(idAnuncios) as Anuncios, MONTH(fecha) as Mes FROM anuncios WHERE YEAR(fecha) = YEAR(NOW()) GROUP BY MONTH(fecha)";
$resultado=  $conexion->ejecutarConsulta($sql);
$valoresY= array();
$valoresX= array();

while($ver=mysqli_fetch_row($resultado)){
	$valoresY[]=$ver[0];
	$valoresX[]=$ver[1];
}

$datosX=json_encode($valoresX);
$datosY=json_encode($valoresY);


?>

<div id="graficoLineal"></div>
<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr= [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">

	datosX = crearCadenaLineal('<?php  echo $datosX ?>');
	datosY = crearCadenaLineal('<?php  echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter',
		marker: {
          color: 'green',
          size: 8
     }
	};


	var data = [trace1];

	var layout = 
	{  
		title: 'Anuncios publicados por mes (año actual)',
		height: 350,
		width: 370,
		yaxis: {
			title: 'Cantidad Anuncios'
		},
		xaxis: {
			title: 'Meses'
		}};




		Plotly.newPlot('graficoLineal', data, layout);
	</script>