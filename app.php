<?php
if (isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowedExt = ['xls', 'csv', 'xlsx'];
}
?>