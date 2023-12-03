<?php

// Verifica se os dados do formulário estão preenchidos
if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['settings'])) {
    // Os dados do formulário não estão preenchidos, redirecione o usuário para a página de registro
    header("Location: register.php");
    exit;
}

// Salva os dados do formulário no banco de dados
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$settings = $_POST['settings'];

$sql = "INSERT INTO users (name, email, password, settings) VALUES ('$name', '$email', '$password', '$settings')";

$conn = new PDO("mysql:host=127.0.0.1;lab", "root", "");
$conn->exec($sql);

// Cria uma sessão para o usuário
$_SESSION['user'] = $name;

// Redireciona o usuário para a página inicial
header("Location: index.php");
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
