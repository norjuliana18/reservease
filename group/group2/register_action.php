<?php
include("config.php");
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php

//STEP 1: Form data handling using mysqli_real_escape_string function to escape special characters for use in an SQL query,
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $userPwd = mysqli_real_escape_string($conn, $_POST['userPwd']);
    $confirmPwd = mysqli_real_escape_string($conn, $_POST['confirmPwd']);
    $userRoles = mysqli_real_escape_string($conn, $_POST['userRoles']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    //Validate pwd and confrimPwd
    if ($userPwd !== $confirmPwd) {
        die("Password and confirm password do not match.");
    }

    //STEP 2: Check if userEmail already exist
    $sql = "SELECT * FROM user WHERE userEmail='$userEmail' or username='$username' LIMIT 1"; 
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        echo "<p ><b>Error: </b> User exist, please register a new user</p>";       
    } else {
        // User does not exist, insert new user record, hash the password       
        $pwdHash = trim(password_hash($_POST['userPwd'], PASSWORD_DEFAULT)); 
        //echo $pwdHash;
        $sql = "INSERT INTO user (userEmail, userPwd, userRoles, username) VALUES ('$userEmail',
         '$pwdHash', '$userRoles', '$username')";
        $insertOK=0;

        if (mysqli_query($conn, $sql)) {
            echo "<p>New user record created successfully.</p>";
            echo"<a href= login.php>| Back |</a>";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        }
    }


mysqli_close($conn);

?>
</body>
</html>
