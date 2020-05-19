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

$sql = "SELECT p.idPersona, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.correo, p.fechaNac, p.idTipoUsuario,p.idMunicipio, m.nombre 'municipio', d.nombre 'depto',t.descripcion 'tipo' FROM persona p
INNER JOIN municipio m on m.idMunicipio=p.idMunicipio
INNER join deptos d on d.idDeptos=m.idDeptos
INNER JOIN tipousuario t on t.idTipoUsuario=p.idTipoUsuario 
WHERE t.descripcion LIKE 'normal'
ORDER BY  p.idMunicipio ASC";

$resultado = $conexion->ejecutarConsulta($sql);

//consulta total 
$sqlt1 ="SELECT count(*) 'total' FROM persona p
INNER JOIN tipousuario t on t.idTipoUsuario=p.idTipoUsuario 
WHERE t.descripcion LIKE 'normal'";
$resultadot1 = $conexion->ejecutarConsulta($sqlt1);

$fpdf = new pdf('P','mm','letter',true);
$fpdf->AddPage('portrait', 'letter');
$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont('Arial', '', 14);
$fpdf->SetTextColor(255,255,255);

$fpdf->SetY(25);
$fpdf->SetX(90);
$fpdf->Write(5, 'Lista Usuarios ');



$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);

$fpdf->SetY(60);
//$fpdf->SetX(90);
$fpdf->Write(5, 'Informacion Usuarios vendedores/compradores');
$fpdf->SetY(70);
$fpdf->Write(5, 'Total registrados:');
$fpdf->SetX(50);
while ( $tot = $conexion->obtenerFila($resultadot1)  ) {
	$fpdf->Write(5, $tot["total"]);
}

$fpdf->SetY(80);
$fpdf->SetX(70);
$fpdf->Write(5, 'Lista Vendedores / Compradores');

$fpdf->SetTextColor(0,0,0);
//$fpdf->Image('images/2.jpg', 20, 55);
$fpdf->SetFont('Arial', '', 9);
$fpdf->SetY(90);
$fpdf->SetTextColor(255,255,255);
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(10, 10, 'NO', 0, 0, 'L', 1);
$fpdf->Cell(60, 10, 'NOMBRE COMPLETO', 0, 0, 'L', 1);
$fpdf->Cell(40, 10, 'CORREO', 0, 0, 'L', 1);
$fpdf->Cell(25, 10, 'FECHA NAC', 0, 0, 'L', 1);
//$fpdf->Cell(25, 10,'TIPO USUARIO', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, 'MUNICIPIO', 0, 0, 'L', 1);
$fpdf->Cell(30, 10, 'DEPARTAMENTO', 0, 0, 'L', 1);
$fpdf->Ln();

$cantidad=1;

$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);
while ( $persona = $conexion->obtenerFila($resultado)  ) {
	$fpdf->Cell(10, 10, $cantidad  , 0, 0, 'C', 1);
	$fpdf->Cell(60, 10, $persona["primerNombre"]." ".$persona["segundoNombre"]." ".$persona["primerApellido"]." ".$persona["segundoApellido"]  , 0, 0, 'L', 1);
	$fpdf->Cell(40, 10, $persona["correo"], 0, 0, 'L', 1);
	$fpdf->Cell(25, 10, $persona["fechaNac"] , 0, 0, 'L', 1);
	//$fpdf->Cell(25, 10, $persona["tipo"], 0, 0, 'C', 1);
	$fpdf->Cell(30, 10, $persona["municipio"] , 0, 0, 'L', 1);
	$fpdf->Cell(30, 10, $persona["depto"] , 0, 0, 'L', 1);
	$fpdf->Ln();
	$cantidad++;
}


//Lista empresas
$sql2 = "SELECT p.idPersona, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.correo, p.fechaNac, p.idTipoUsuario,p.idMunicipio, m.nombre 'municipio', d.nombre 'depto',t.descripcion 'tipo' FROM persona p
INNER JOIN municipio m on m.idMunicipio=p.idMunicipio
INNER join deptos d on d.idDeptos=m.idDeptos
INNER JOIN tipousuario t on t.idTipoUsuario=p.idTipoUsuario 
WHERE t.descripcion LIKE 'empre'
ORDER BY  p.idMunicipio ASC";

$resultado2 = $conexion->ejecutarConsulta($sql2);

//consulta total 
$sqlt2 ="SELECT count(*) 'total' FROM persona p
INNER JOIN tipousuario t on t.idTipoUsuario=p.idTipoUsuario 
WHERE t.descripcion LIKE 'normal'";
$resultado1 = $conexion->ejecutarConsulta($sqlt2);

$fpdf->OutPut();
