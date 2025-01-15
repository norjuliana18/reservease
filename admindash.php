<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript"></script>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    
    <link rel="stylesheet" href="css/style.css">


    <?php include 'config.php'?>

   

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
	
         <?php
         
 $countReservations = "SELECT COUNT(*) AS totalReservations FROM reservation1";
 $countResult3 = mysqli_query($conn, $countReservations);
$countUser = "SELECT COUNT(*) AS totalCount FROM user";
$countResult2 = mysqli_query($conn, $countUser);



if ($countResult3) {
    // Fetch the total number of reservations
    $row3 = mysqli_fetch_assoc($countResult3);

    if (isset($row3['totalReservations'])) {
        $totalReservations = $row3['totalReservations'];

        // You can now use $totalReservations as needed
    } else {
        echo "Total reservations data not found.";
    }
} else {
    echo "Error counting reservations: " . mysqli_error($conn);
}


if ($countResult2) {
    // Fetch the total number of user
    $row2 = mysqli_fetch_assoc($countResult2);

    if (isset($row2['totalCount'])) {
        $totalUser = $row2['totalCount'];

        
        $sql2 = "SELECT userID FROM user ";
        $result2 = mysqli_query($conn, $sql2);

        
        if ($result2) {
            
            if (mysqli_num_rows($result2) > 0) {
                
            }
        } else {
            echo "Error executingssss the query: " . mysqli_error($conn);
        }
          
    } else {
        echo "Total reservations data not found.";
    }
} else {
    echo "Error counting reservations: " . mysqli_error($conn);
}






    


mysqli_close($conn);
?>
<div class="center-table" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
<table id="projectable">
    <tr>
        <th>Total Reservation</th>
    </tr>
</table>

<table id="projectable">
    <tr>
        <th>Total User</th>
    </tr>
</table>
        <a href="userMgmt.php"><button>Expand User</button></a>
    </div>
         
             </table>
         </div>

         <section class="styled-box" >
        <h2 style="color: white;"><a href="resChart.php" style="color: white; text-decoration: none;">Reservation Trend</a></h2>    
    </section>
   

</body>
</html>
