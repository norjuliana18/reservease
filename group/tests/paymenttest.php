<?php
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        // Initialize a test database connection
        $this->mysqli = new mysqli('localhost', 'root', '', 'test_db');
        if ($this->mysqli->connect_error) {
            $this->fail("Database connection failed: " . $this->mysqli->connect_error);
        }

        // Insert test data (if required)
        $this->mysqli->query("INSERT INTO users (username, password) VALUES ('testuser', '".password_hash('testpassword', PASSWORD_DEFAULT)."')");
    }

    protected function tearDown(): void {
        // Clean up test data
        $this->mysqli->query("DELETE FROM users WHERE username = 'testuser'");
        $this->mysqli->close();
    }

    public function testSuccessfulPayment() {
        $_POST['user_id'] = 1;
        $_POST['amount'] = 100.00;

        ob_start();
        include 'payment.php'; // Assuming the payment logic is inside payment.php
        $output = ob_get_clean();

        $this->assertStringContainsString('Payment successful', $output, "Payment should be successful for valid inputs.");
    }

    public function testPaymentFailure() {
        $_POST['user_id'] = 9999;  // Invalid user ID
        $_POST['amount'] = 100.00;

        ob_start();
        include 'payment.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Payment failed', $output, "Payment should fail for invalid user.");
    }
}
