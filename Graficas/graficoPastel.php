<?php
  require_once "../backend/class-conexion.php";
  $conexion = new Conexion();
  $sql="SELECT count(idAnuncios) as Anuncios, YEAR(fecha) as Anio FROM anuncios GROUP BY YEAR(fecha)";
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


<div id="graficoPastel"></div>
<script type="text/javascript">
	function crearCadenaPastel(json){
		var parsed = JSON.parse(json);
		var arr= [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>
<script type="text/javascript">

	datosX = crearCadenaPastel('<?php  echo $datosX ?>');
	datosY = crearCadenaPastel('<?php  echo $datosY ?>');
	var data = [{
		values: datosX,
		labels: ['X', 'Y'],
		type: 'pie'
	}];

	var layout = {
		height: 350,
		width: 350
	};

	Plotly.newPlot('graficoPastel', data, layout);
</script>