<!DOCTYPE html>
<html lang="en">
<head>
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
    
    
    <section class="styled-box" >
        <h2 style="color: white;"><a href="admindash.php" style="color: white; text-decoration: none;">Admin Dashboard</a></h2>    
    </section>

    <section class="styled-box" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -60%);">
        <h2  style="color: white;"><a href="userMgmt.php" style="color: white; text-decoration: none;">User Management</a></h2>
    </section>
    

   

   

</body>
</html>
