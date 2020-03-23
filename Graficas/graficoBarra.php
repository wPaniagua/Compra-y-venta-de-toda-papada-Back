<?php
require_once "../backend/class-conexion.php";
$conexion = new Conexion();
$sql="SELECT count(idDenuncias) as Denuncias, MONTH(fecha) as Mes FROM denuncias WHERE YEAR(fecha) = YEAR(NOW()) GROUP BY MONTH(fecha)";
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

<div id="graficoBarra"></div>
<script type="text/javascript">
	function crearCadenaBarra(json){
		var parsed = JSON.parse(json);
		var arr= [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX = crearCadenaBarra('<?php  echo $datosX ?>');
	datosY = crearCadenaBarra('<?php  echo $datosY ?>');
	var data = [
	{
		x: datosX,
		y: datosY,
		type: 'bar'
	}
	];

	var layout = {
		title: 'Denuncias Registradas por mes (Año actual)',
		height: 350,
		width: 380,
		yaxis: {
			title: 'Cantidad Denuncias'
		},
		xaxis: {
			title: 'Meses'
		}};

		Plotly.newPlot('graficoBarra', data, layout);

	</script>