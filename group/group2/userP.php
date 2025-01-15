<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript"></script>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    
    <link rel="stylesheet" href="css/style.css">

    <style>
        
        .styled-box {
            border-radius: 96px;
            background: #103b56;
            box-shadow: inset 19px 19px 21px #0b2739,
                        inset -19px -19px 21px #154f73;
            padding: 20px; 
            text-align: center; 
            font-size: 18px; 
            color: #333; 
        

         
         position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        body {
            background-image: url('images/office.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container1 {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="#" title="Logo">
             <img src="images/group_logo.png" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>

        <div class="menu text-right">
            <ul>
                <li>
                    <a href="restaurant.php">Restaurants</a>
                </li>
                <li>
                    <a href="reservations.php">Reservation</a>
                </li>
                <li>
                    <a href="admindash.php">Admin Dashboard</a>
                </li>
                <li>
                    <a href="userP.php">User Profile</a>
                </li>
                <a href="logout.php"><button class="btnLogout-popup">Logout</button></a>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</section>
</section>
    
    
    
<section class="container1">
        <h2>User Profile</h2>
        <?php
        session_start();
        include("config.php");
        
        // Check if the user is logged in
        if (isset($_SESSION["UID"])) {
            $userID = $_SESSION["UID"];
            
            // Retrieve user information from the database
            $sql = "SELECT * FROM user WHERE userID = '$userID' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                echo "<p>User ID: " . $row['userID'] . "</p>";
                echo "<p>Username: " . $row['username'] . "</p>";
                echo "<p>Email: " . $row['userEmail'] . "</p>";
                echo "<p>Role: " . $row['userRoles'] . "</p>";
                // Add more user information fields as needed

                if (!empty($row['profile_picture'])) {
                    $profile_picture_url = "images/profileP/" . $row['profile_picture'];
                    echo '<img src="' . $profile_picture_url . '" alt="Profile Picture" width="150">';
                } else {
                    echo "No profile picture available.";
                }
            } else {
                echo "User not found.";
            }
        } else {
            echo "You are not logged in.";
        }

        
        ?>

<form action="upload_profile_picture.php" method="POST" enctype="multipart/form-data">
    <h2>Upload Profile Picture</h2>
    <input type="file" name="profile_picture" accept=".jpg, .jpeg, .png">
    <input type="submit" name="upload" value="Upload">
</form>
    </section>
  
   

</body>
</html>
