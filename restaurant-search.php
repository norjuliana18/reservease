<?php
// Include the database connection file
include 'config.php';

// Handle search query
if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM restaurant WHERE name LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . $query . "<br>" . mysqli_error($conn));
    }

    // Display search results
    echo "<div class='container'>";
    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='food-menu-box'>";
            echo "<div class='food-menu-img'><img src='{$row['restaurant_image']}' alt='{$row['name']}' class='img-responsive img-curve'></div>";
            echo "<div class='food-menu-desc'>";
            echo "<h4>{$row['name']}</h4>";
            echo "<p class='food-price'>{$row['address']}</p>";
            echo "<p class='food-detail'>{$row['description']}</p>";
            echo "<a href='restaurant_details.php?restaurant_id={$row['restaurant_id']}' class='btn btn-primary'>View Details</a>";
            echo "</div></div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
    echo "</div>";

    // Close the search results section
    echo "<hr>";

    // Close the database connection and stop further execution
    mysqli_close($conn);
    exit();
}
?>
