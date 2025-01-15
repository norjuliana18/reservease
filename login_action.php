<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("config.php");
?>
<html>
<head>
    <title>Login Action</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
<body>
    <h2>Login Information</h2>
    <?php
    //login values from login form
    $userEmail = $_POST['userEmail']; 
    $userPwd = $_POST['userPwd'];
    $sql = "SELECT * FROM user WHERE userEmail = '$userEmail' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {    
        //check password hash
        $row = mysqli_fetch_assoc($result);
        if (password_verify($userPwd, $row['userPwd'])) {
            $_SESSION["userID"] = $row["userID"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["userRoles"] = $row["userRoles"];
            //set logged in time
            $_SESSION['loggedin_time'] = time();

            // Redirect based on userRoles
            if ($_SESSION["userRoles"] == "1" || $_SESSION["userRoles"] == "2") {
                header("location: admin.php");
            } elseif ($_SESSION["userRoles"] == "3") {
                header("location: index.php");
            } else {
                echo 'Invalid user role.';
            }
        } else {
            echo 'Login error, user email and password are incorrect.<br>';
            echo '<a href="login.php?login=1"> | Login |</a> &nbsp;&nbsp;&nbsp; <br>';
        }
    } else {
        echo "Login error, user <b>$userEmail</b> does not exist. <br>";
        echo '<a href="login.php?login=1"> | Login |</a>&nbsp;&nbsp;&nbsp; <br>';   
    } 

    mysqli_close($conn);
    ?>
</body>
</html>
