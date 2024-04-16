<?php

$baseURL = $_GET['base_url'];
$fileName = $_GET['file_name'];

// Connect to FTP
$ftp = ftp_connect('127.0.0.1');
$ftp_login = ftp_login($ftp, 'polymorphx', '');

// Get file
$result = ftp_get($ftp, $fileName, $baseURL);

if ($result == null) {
    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
