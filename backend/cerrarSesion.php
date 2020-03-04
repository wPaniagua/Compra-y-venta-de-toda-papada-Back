<?php 

session_start(); 


$_SESSION["id_usuario"] = null;

echo json_encode(array("ok"=>true))

?>