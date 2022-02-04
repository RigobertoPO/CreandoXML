<?php
include_once 'Funciones.php';
$obj = new FuncionesXml();
$obj->CreandoXML();   // Muestra Public, Protected y Private
$obj->LeerXML();
//CreandoXML desde BD();
$obj->CreandoXML_BD();
$obj->LeerXML_BD();
?>