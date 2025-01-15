<?php
use PHPUnit\Framework\TestCase;

class ReservationTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        // Initialize a test database connection
        $this->mysqli = new mysqli('localhost', 'root', '', 'test_db');

        if ($this->mysqli->connect_error) {
            $this->fail("Database connection failed: " . $this->mysqli->connect_error);
        }

        // Seed test data
        $this->mysqli->query("INSERT INTO users (username, password) VALUES ('testuser', '".password_hash('testpassword', PASSWORD_DEFAULT)."')");
        $this->mysqli->query("INSERT INTO restaurants (name, location) VALUES ('Test Restaurant', 'Test Location')");
    }

    protected function tearDown(): void {
        // Clean up test data
        $this->mysqli->query("DELETE FROM users WHERE username = 'testuser'");
        $this->mysqli->query("DELETE FROM restaurants WHERE name = 'Test Restaurant'");
        $this->mysqli->query("DELETE FROM reservations WHERE user_id = 1");
        $this->mysqli->close();
    }

    public function testSuccessfulReservation() {
        $_POST['user_id'] = 1;  // Assuming test data uses this ID
        $_POST['restaurant_id'] = 1;
        $_POST['reservation_date'] = '2025-01-20 18:00:00';

        ob_start();
        include 'reservations.php';  // Ensure the reservation logic is included here
        $output = ob_get_clean();

        $this->assertStringContainsString('Reservation successful', $output, "Reservation should be successful with valid data.");
    }

    public function testReservationWithInvalidUser() {
        $_POST['user_id'] = 9999;  // Invalid user
        $_POST['restaurant_id'] = 1;
        $_POST['reservation_date'] = '2025-01-20 18:00:00';

        ob_start();
        include 'reservations.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('User not found', $output, "Reservation should fail for non-existing user.");
    }

    public function testReservationWithoutDate() {
        $_POST['user_id'] = 1;
        $_POST['restaurant_id'] = 1;
        $_POST['reservation_date'] = '';  // Missing date

        ob_start();
        include 'reservations.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Reservation date is required', $output, "Reservation should fail when no date is provided.");
    }
}
