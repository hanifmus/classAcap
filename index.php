<?php
    require 'config.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = new Dbh();

        $stmt = $conn->connect()->prepare("SELECT * from user WHERE username = '$username';");
        if($stmt->rowCount() > 0){
            echo "username already exist";
        }else{
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->connect()->prepare("INSERT INTO user VALUES('$username', '$hashedpassword');");
            header("location: userpage.php");
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
        <input type="text" name="username" placeholder="username">
        <input type="password"  name="password" placeholder="password">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
