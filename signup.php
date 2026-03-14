<?php
$conn = new mysqli("localhost", "root", "", "projecttest");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert user into database
$stmt = $conn->prepare("INSERT INTO registration (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    // Redirect to dashboard or HTML page
    header("Location: index.php"); 
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>