<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowedExt = ['xls', 'csv', 'xlsx'];

    if (in_array($fileExt, $allowedExt)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory ::load($inputFileNamePath);
        $data = $spreadsheet -> getActiveSheet() -> toArray();
    }
}
?>