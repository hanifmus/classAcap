<?php
    session_start();

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=d, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><?= $username ?></div>
    <div><?= $password ?></div>  <!--display container-->
</body>
</html>