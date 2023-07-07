<?php
    session_start();

    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $course = $_SESSION['course'];
    $password = $_SESSION['pass'];
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
    <div><?= $name ?></div>
    <div><?= $age ?></div>  <!--display container-->
    <div><?= $course ?></div>
    <div><?= $password ?></div>

</body>
</html>