<?php

session_start();
    require 'config.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];
        $pass = $_POST['pass'];
        $conn->query("SELECT * from student WHERE name = '$name';");
        if(mysqli_affected_rows($conn) > 0){
            echo "username already exist";
        }else{
            $hashedpassword = password_hash($pass, PASSWORD_DEFAULT);
            $conn->query("INSERT INTO student VALUES('$name','$age', '$course', '$hashedpassword');");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="bocchi.jpg" type="image/x-icon">
    <title>Sign Up</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="text"  name="age" placeholder="age">
        <input type="text" name="course" placeholder="course">
        <input type="password"  name="pass" placeholder="pass">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
