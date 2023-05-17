<?php

/**
 * File name: login.php
 *
 * PHP script that stores user data in session.
 *
 * PHP version 8.2
 *
 * @category PHP
 * @package  MyPackage
 * @author   sijila <sijila.b@codilar.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://example.com/my_file
 */

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = array();
    if (file_exists('users.json')) {
        $users = json_decode(file_get_contents('users.json'), true);
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $users[$username]['email'];
        $_SESSION['auth'] = true;
        header("Location: home.php");
        exit;
    } else {
        echo "Error: invalid login";
    }
} elseif (isset($_SESSION['auth']))
{
        header("Location: home.php");
        exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css" class="rel">
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
    </form>
</body>
</html>
