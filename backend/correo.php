<?php
session_start(); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'C:\xampp\composer\vendor\autoload.php';


$connect = new PDO('mysql:host=localhost:3306;dbname=mydb', 'root', '');


$idAnuncio = $_GET["idAnuncio"];
$idUser = $_SESSION["id_usuario"];
$nombre = $_POST["name"];
$correo =  $_POST["email"];
$telefono = $_POST["phone"];
$mensaje = $_POST["message"];
//$idAnuncio = $_POST["idAnuncio"];

/*$nombreVendedor = "
select CONCAT(p.primerNombre, ' ',p.primerApellido ) as nombre from persona p  
where 
p.idPersona = $idAnuncio";

$statement = $connect->prepare($nombreEmisor);

$statement->execute(
    array(
        $idUser=>$nombreEmisor
    )
); */
 $correoVendedor = "waleska.alvarado7@gmail.com";
 $nombreVendedor = "Vendedoor";

//Instancia
$mail = new PHPMailer(TRUE);

try {

    $mail -> charSet = "UTF-8"; 

    //direccion de quien envia el correo
    $mail->setFrom($correo, $nombre);

    //direccion de a quien se envia el correo
    $mail->addAddress($correoVendedor, $nombreVendedor);

    //La razon del correo
    $mail->Subject = 'Correo de contacto';

    //aqui se pone el cuerpo del email
    $mail->Body = $mensaje;

    /* Parametros SMTP. */
    /* Le dice a  PHPMailer que use SMTP. */
    $mail->isSMTP();

    /* Direccion del servidor de SMTP, en este caso uso el de google. */
    $mail->Host = 'smtp.gmail.com';

    /* Usar SMTP autenticacion. */
    $mail->SMTPAuth = TRUE;


    /* Configura el sistema de encriptacion. */
    $mail->SMTPSecure = 'ssl';//tls


    /* Aqui va el usuario de la cuenta de google del proyecto. */
    $mail->Username = 'publitodo.2020@gmail.com';

    /* La contrasena de la cuenta. */
    $mail->Password = 'Publitodo_2020.';

    /* El puerto en el que esta el servidor SMTP de Google. */
    $mail->Port = 465;

    //le dice la extension  que el cuerpo del mail es html
    $mail-> IsHTML(true);

    /* Envia el correo */
    $mail->send();

    if($mail->send() == false){
        echo "Su mensaje no fue enviado";
                }else{
                    echo "Mensaje Enviado";
                }

                echo json_encode(array(
                    "ok"=>true
                ));
            }
    catch (Exception $e)
            {
                echo $e->errorMessage();
            }
    catch (\Exception $e)
            {
                echo $e->getMessage();
            }


?>