<?php


class ExcelController{


   public function index()
   {
      require_once '../models/ExcelModel.php';
      $objeto = new ExcelModel();
      $objeto->crearHoja('hola');
   }

   public function read(){
      require_once '../models/ExcelModel.php';
      $objeto = new ExcelModel();
      $respuesta = $objeto->leerHoja();

      return $respuesta;
   }

}




 ?>
