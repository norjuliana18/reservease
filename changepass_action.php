<?php
include_once("config.php");
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

    //STEP 2: Check if userEmail already exist
    $sql = "SELECT * FROM user WHERE userEmail='$userEmail' or username='$username' LIMIT 1"; 
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
              // User does not exist, insert new user record, hash the password       
              $pwdHash = trim(password_hash($_POST['userPwd'], PASSWORD_DEFAULT)); 
              //echo $pwdHash;
              $sql = "UPDATE user SET userPwd = '$pwdHash' WHERE userEmail = '$userEmail'";
              $insertOK=0;
      
              if (mysqli_query($conn, $sql)) {
                  echo "<p>Password updated successfully.</p>";
                  echo"<a href= login.php>| Back |</a>";
              } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              echo "<p>Failed to update password.</p>";
              }
              }

    } else {
        echo "<p>User does not exist</p>";
    }


mysqli_close($conn);

?>
</body>
</html>
