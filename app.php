<?php
require_once 'connect.php';
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

        foreach ($data as $row) {
            $fullname = $row['0'];
            $email = $row['1'];
            $phone = $row['2'];
            $course = $row['3'];

            $studentQuery = "INSERT INTO students (fullname, email, phone, course) VALUES ('$fullname','$email','$phone','$course')";
            $result = mysqli_query($connect, $studentQuery);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: index.php');
        exit(0);
    }
}
?>