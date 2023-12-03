<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, username, password, page_background_color, font_color FROM users WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $page_background_color, $font_color);
        if ($stmt->fetch()) {
            if (password_verify($password, $hashed_password)) {
                session_start();

                setcookie('username', $username, time() + (86400 * 30), '/');
                setcookie('page_background_color', $page_background_color, time() + (86400 * 30), '/');
                setcookie('font_color', $font_color, time() + (86400 * 30), '/');

                header("location: welcome.php");
            } else {echo "<script>alert('Registration successful. Please login.');</script>";
            }
        }
    }
}
               