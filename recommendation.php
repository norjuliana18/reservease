<?php
function getRecommendedRestaurants($conn)
{
    $recommended_restaurants = [];

    // Your logic to fetch recommended restaurants based on reservations
    $sql = "SELECT DISTINCT r.restaurant_id
            FROM reservation1 r1
            JOIN restaurant r ON r1.restaurant_id = r.restaurant_id
            ORDER BY RAND() LIMIT 3";  // Change the limit as needed

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $recommended_restaurants[] = $row['restaurant_id'];
        }
    }

    return $recommended_restaurants;
}
?>

