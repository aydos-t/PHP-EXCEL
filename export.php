<?php
require_once 'connect.php';
require 'vendor/autoload.php';

if (isset($_POST['export_excel_data'])) {
    $fileExt = $_POST['export_file_type'];
}
?>