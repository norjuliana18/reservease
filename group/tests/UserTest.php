<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        $_POST['username'] = 'testuser';
        $_POST['password'] = 'testpassword';
        ob_start();
        include 'login.php';
        $output = ob_get_clean();
        $this->assertEquals(1, $output, "Login should succeed");
    }
}
