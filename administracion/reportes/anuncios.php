
<?php
require('../pdf/fpdf.php');
require '../../backend/class-conexion.php';

$id = 42;
class pdf extends FPDF
{
	public function header()
	{
		$this->SetFillColor(9, 31,54);
		$this->Rect(0,0, 220, 50, 'F');
		$this->SetY(15);
		$this->SetX(75);
		$this->SetFont('Arial', 'B', 30);
		$this->SetTextColor(255,255,255);
		$this->Write(5, 'PUBLITODO');

	}

	public function footer()
	{
		$this->SetFillColor(9, 31,54);//20, 29,78
		$this->Rect(0, 250, 220, 50, 'F');
		$this->SetY(-20);
		$this->SetFont('Arial', 'B', 20);
		$this->SetTextColor(255,255,255);
		$this->SetX(120);
		$this->Write(5, 'PUBLITODO');
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, 'PUBLITODO@gmail.com');
		$this->SetX(120);
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, '+(503)7889-8787');
	}
}


$conexion = new Conexion();

$sql = "SELECT a.idAnuncios, a.titulo, a.descripcion, a.precio,a.idPersona, a.idMoneda, a.idProducto, a.estado, a.fecha, a.razones 
,c.descripcion 'categoria',m.descripcion 'moneda', pe.primerNombre,pe.segundoNombre,pe.primerApellido,pe.segundoApellido 
FROM anuncios a INNER join producto p on p.idProducto=a.idProducto
inner join categorias c on c.idCategorias=p.idCategorias
INNER join persona pe on pe.idPersona=a.idPersona
INNER JOIN moneda m on m.idMoneda=a.idMoneda
ORDER by fecha DESC";

$resultado = $conexion->ejecutarConsulta($sql); 

$fpdf = new pdf('P','mm','letter',true);
$fpdf->AddPage('portrait', 'letter');
$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont('Arial', '', 14);
$fpdf->SetTextColor(255,255,255);

$fpdf->SetY(25);
$fpdf->SetX(90);
$fpdf->Write(5, 'Lista Anuncios ');
/*$fpdf->Ln();
$fpdf->SetX(90);
$fpdf->Write(5, 'Empresa ');
$fpdf->Ln();
$fpdf->SetX(120);
$fpdf->Write(5, 'Fecha de envío: ');
$fpdf->Ln();
$fpdf->SetX(120);
$fpdf->Write(5, 'Dirección: ');
$fpdf->Ln();
$fpdf->SetX(120);
$fpdf->Write(5, 'Ciudad: ');
*/
$fpdf->SetTextColor(0,0,0);
//$fpdf->Image('images/2.jpg', 20, 55);
$fpdf->SetFont('Arial', '', 9);
$fpdf->SetY(60);
$fpdf->SetTextColor(255,255,255);
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(10, 10, 'NO', 0, 0, 'L', 1);
$fpdf->Cell(40, 10, 'TITULO', 0, 0, 'L', 1);
$fpdf->Cell(20, 10, 'PRECIO', 0, 0, 'L', 1);
$fpdf->Cell(25, 10, 'FECHA', 0, 0, 'L', 1);
$fpdf->Cell(40, 10,'DADO DE BAJA POR', 0, 0, 'L', 1);
$fpdf->Cell(20, 10, 'MONEDA', 0, 0, 'L', 1);
$fpdf->Cell(50, 10, 'ANUNCIANTE', 0, 0, 'L', 1);
$fpdf->Ln();

$cantidad=1;

$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);
while ( $anuncios = $conexion->obtenerFila($resultado)  ) {
	$fpdf->Cell(10, 10, $cantidad  , 0, 0, 'L', 1);
	$fpdf->Cell(40, 10, $anuncios["titulo"], 0, 0, 'L', 1);
	$fpdf->Cell(20, 10, $anuncios["precio"], 0, 0, 'L', 1);
	$fpdf->Cell(25, 10, $anuncios["fecha"] , 0, 0, 'L', 1);
	$fpdf->Cell(40, 10, $anuncios["razones"] , 0, 0, 'L', 1);
	$fpdf->Cell(20, 10, $anuncios["moneda"] , 0, 0, 'L', 1);
	$fpdf->Cell(50, 10,  $anuncios["primerNombre"]." ".$anuncios["segundoNombre"]." ".$anuncios["primerApellido"]." ".$anuncios["segundoApellido"] , 0, 'C', 1);
	$fpdf->Ln();
	$cantidad++;
	if ($cantidad==19) {
		# code...
		$fpdf->OutPut();
	}
	
}
$fpdf->OutPut();


