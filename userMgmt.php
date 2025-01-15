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
    
    
    <div style="padding:0 10px;">
	<table border="1" width="100%" id="projectable" style="background-color: white;">
		

        
        <form method="get">
            <input type="text" name="search" placeholder="Search by username or email">
            <button type="submit">Search</button>
        </form>

        
        
            <table border="1" width="100%" id="projectable" style="background-color: white; border-collapse: collapse;">
    <tr>
        <th width="5%">User ID</th>
        <th width="10%">Username</th>
        <th width="30%">Email</th>
    </tr>
    <?php
include 'config.php';

$sql = "SELECT userID, username, userEmail FROM user LIMIT 10";

$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['userID'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['userEmail'] . '</td>';
        echo '</tr>';
    }
} else {
    echo 'Error executing the query: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>

</table>

        </table>
         
         
         
             </table>
         </div>

         
  
   

</body>
</html>
