<?php

/**
 * File name: logout.php
 *
 * PHP script that store data in localstorage using session.
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

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page
header('Location: login.php');
exit();
