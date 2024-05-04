<?php

ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL);

$conn = mysqli_connect('localhost', 'root', '', 'db_rmanager');

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function getFileFormat($nameFile)
{
    $arrName = explode('.', $nameFile);

    return end($arrName);
}

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function uploadFile($data)
{
    global $conn;

    $fileCode = uniqid();
    $uploadDir = './files/';
    $fileName = $data['file']['name'];
    $fileSize = $data['file']['size'];
    $uploadFile = $uploadDir  . basename($fileName);
    $date = date('Y/m/d');

    $query = "INSERT INTO tb_files VALUES ('$fileCode', '$fileName', '$fileSize', '$uploadFile', '$date')";

    mysqli_query($conn, $query);
    move_uploaded_file($data['file']['tmp_name'], $uploadFile);

    return mysqli_affected_rows($conn);
}

function getTotalFiles()
{
    global $conn;

    $query = "SELECT count(*) as total FROM tb_files";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function sumSize()
{
    global $conn;

    $query = "SELECT sum(ukuran_file) as size FROM tb_files";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function downloadFile($fileName)
{
    header('Content-type: ' . mime_content_type("./files/$fileName"));
    header("Content-Disposition: attachment; filename=./files/$fileName");
    header("Content-Length: " . filesize("./files/$fileName"));

    echo file_get_contents("./files/$fileName", true);
}

function deleteFile($fileName, $kdFile)
{
    global $conn;

    $query = "DELETE FROM tb_files WHERE kd_file = '$kdFile'";
    mysqli_query($conn, $query);

    unlink("./files/$fileName");

    return mysqli_affected_rows($conn);
}
