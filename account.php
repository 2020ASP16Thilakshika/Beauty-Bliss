<?php
include 'db.php';

// Insert new user (signup)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)");
    $stmt->execute(['full_name' => $full_name, 'email' => $email, 'password' => $password]);
    echo "Account created successfully!";
}

// Authenticate user (login)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo "Welcome, " . $user['full_name'];
    } else {
        echo "Invalid email or password.";
    }
}
?>
