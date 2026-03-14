<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = new mysqli('localhost', 'root', '', 'projecttest');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header("Location: normalLogin.html?error=missing_fields");
    exit();
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$stmt = $conn->prepare("SELECT password FROM registration WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($db_pass);
    $stmt->fetch();

    if (password_verify($password, $db_pass)) {
        $_SESSION['email'] = $email;
        header("Location: NIGGER.html");
        exit();
    } else {
        header("Location: normalLogin.html?error=wrong_credentials");
        exit();
    }
} else {
    header("Location: normalLogin.html?error=wrong_credentials");
    exit();
}

$stmt->close();
$conn->close();
?>
