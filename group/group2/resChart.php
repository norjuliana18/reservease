<!DOCTYPE HTML>
<html>
<head>
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

    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Restaurant Name');
            data.addColumn('number', 'Reservation Count');

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "group2";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch reservation counts by restaurant
            $sql = "SELECT restaurant_id, COUNT(*) AS reservation_count FROM reservation1 GROUP BY restaurant_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "data.addRows([";
                while ($row = $result->fetch_assoc()) {
                    $restaurantId = $row["restaurant_id"];
                    $reservationCount = $row["reservation_count"];
                    echo "['Restaurant ID " . $restaurantId . "', " . $reservationCount . "],";
                }
                echo "]);";
            }

            $conn->close();
            ?>

            var options = {
                title: 'Reservation Count by Restaurant',
                hAxis: {
                    title: 'Restaurant Name',
                },
                vAxis: {
                    title: 'Reservation Count',
                    minValue: 0
                },
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chartContainer'));
            chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawChart);
    </script>
</body>
</html>
