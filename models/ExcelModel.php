<?php

require '../librerias/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ExcelModel {

   public function crearHoja($nombre)
   {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Mami te quiero mucho !');

      $writer = new Xlsx($spreadsheet);
      $writer->save("../excel/$nombre.xlsx");
   }

   public function leerHoja(){
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      $reader->setReadDataOnly(true);
      $reader->setLoadSheetsOnly('prueba');
      $spreadsheet = $reader->load("../excel/padron.xlsx");
      $worksheet = $spreadsheet->getActiveSheet();
      $arr = $worksheet->toArray();

      return $arr;
   }


}


?>
