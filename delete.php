<?php

include "function.php";

$fileName = $_GET['file_name'];
$kdFile = $_GET['kd_file'];

if (deleteFile($fileName, $kdFile) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            window.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            window.location.href = 'index.php';
        </script>
    ";
}
