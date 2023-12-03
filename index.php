

<?php 

    require 'vendor/autoload.php'; 

    session_start();

if (isset($_SESSION["username"])) {
    header("Location: welcome.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

<p>Don't have an account? <a href="register.php">Register</a></p>

</body>
</html>