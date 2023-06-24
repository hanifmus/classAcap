<?php
    session_start();

    require 'config.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_post['password'];
        $data = $conn->query("SELECT from user WHERE username = '$username';");
        if(mysqli_affected_rows($conn) > 0){
            $user = $data->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $_SESSION['username'] = $user['username'];
                $_SESSION['password'] = $user['password'];
                header("location: userpage.php");
            }

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
        <input type="text" name="username" placeholder="username">
        <input type="password"  name="password" placeholder="password">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>