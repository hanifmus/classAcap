<?php
    session_start();

    require 'config.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        
        
        $pass = $_POST['pass'];
        $data = $conn->query("SELECT * from student WHERE name = '$name';");
        if(mysqli_affected_rows($conn) > 0){
            $user = $data->fetch_assoc();
            if(password_verify($pass, $user['password'])){
                $_SESSION['name'] = $user['name'];
                $_SESSION['age'] = $user['age'];
                $_SESSION['course'] = $user['course'];
                $_SESSION['pass'] = $user['password'];
                header("location: userpageRes.php");
            }
            else
                echo "password tak betul";

        }else{
            echo "Username not exitsr";
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
    <title>Log in</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="password"  name="pass" placeholder="pass">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
