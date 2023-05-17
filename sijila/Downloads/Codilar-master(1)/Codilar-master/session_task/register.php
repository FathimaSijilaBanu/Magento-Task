<?php

/**
 * File name: register.php
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
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$users = array();
if (file_exists('users.json')) {
    $users = json_decode(file_get_contents('users.json'), true);
}
if (isset($users[$username])) {
    echo "<script>alert('Error: username already exists')</script>";
    exit;
}
$users[$username] = array(
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
);
file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
header("Location: login.php");
exit;
