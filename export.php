<?php
require_once 'connect.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

if (isset($_POST['export_excel_data'])) {
    $fileExt = $_POST['export_file_type'];
    $fileName = "student-sheet";

    $studentQuery = "SELECT * FROM students";
    $result = mysqli_query($connect, $studentQuery);
    if (mysqli_num_rows($result) > 0){
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->setCellValue('A1', 'ID');
        $activeWorksheet->setCellValue('B1', 'Full Name');
        $activeWorksheet->setCellValue('C1', 'Email');
        $activeWorksheet->setCellValue('D1', 'Phone');
        $activeWorksheet->setCellValue('E1', 'Course');

        $rowCount = 2;
        foreach ($result as $data) {
            $activeWorksheet->setCellValue('A'.$rowCount, $data['id']);
            $activeWorksheet->setCellValue('B'.$rowCount, $data['fullname']);
            $activeWorksheet->setCellValue('C'.$rowCount, $data['email']);
            $activeWorksheet->setCellValue('D'.$rowCount, $data['phone']);
            $activeWorksheet->setCellValue('E'.$rowCount, $data['course']);
            $rowCount++;
        }
        if ($fileExt == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $exFilename = $fileName.'.xlsx';
        } elseif ($fileExt == 'xls') {
            $writer = new Xls($spreadsheet);
            $exFilename = $fileName.'.xls';
        } elseif ($fileExt == 'csv') {
            $writer = new Csv($spreadsheet);
            $exFilename = $fileName.'.csv';
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="'.urlencode($exFilename).'"');
        $writer->save('php://output');
    } else {
        $_SESSION['message'] = "Record not found";
        header("Location: index.php");
        exit(0);
    }
}
?>