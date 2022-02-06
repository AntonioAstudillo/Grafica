<?php

header('Content-Type: application/json; charset=utf-8');

require '../controllers/ExcelController.php';

$objeto = new ExcelController();
$respuesta = $objeto->read();

echo json_encode($respuesta);

?>
