<?php
include 'function.php';

$ftp = ftp_connect('127.0.0.1');

ftp_login($ftp, 'polymorphx', '');

// var_dump(ftp_size($ftp, ''));
$files = ftp_nlist($ftp, '');

echo $files[0];
