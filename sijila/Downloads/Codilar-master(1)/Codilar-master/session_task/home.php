<?php

/**
 * File name: home.php
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
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css" class="rel">
</head>
<body>
    <header><h2 class="h2">Welcome, <?php echo $username; ?>!</h2>
    <p>Your email address is <?php echo $email; ?></p>
   </header>
    <nav>
    <a href="home.php">Home</a>
    <a href="logout.php">Logout</a>
</nav>
<section>
<main>
<article>
        <h2>ADMISSION 2023</h2>
        <p><a href="">Click here to apply</a>
    </p>
    </article>
    <article>
        <h2>FREE MCA ENTRANCE COACHING</h2>
        <p><a href="">Click here to apply</a>
        </p>
    </article>
    <article>
        <h2>PLACEMENTS</h2>
        <p><a href="">Click here to view</a></p>
    </article>
</main>
</section>
<footer>
    <p>&copy; 2023 My Website</p>
</footer>

    
</body>
</html>