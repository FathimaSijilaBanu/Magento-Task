<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" class="rel">
</head>
<body>
    <h1>Register Here!</h1>
    <form method="POST" action="register.php">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Register">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
