<?php
include 'function.php';

if (isset($_POST['submit'])) {
    uploadFile($_FILES);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>