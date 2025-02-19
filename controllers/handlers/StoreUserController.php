<?php
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $user = new User($conn);
    $query = "INSERT INTO users (username, email) VALUES (:username, :email)";
    $params = ['username' => $username, 'email' => $email];
    $result = $user->executeQuery($query, $params);

    if ($result['status']) {
        // Setting a cookie upon successful upload
        setcookie('upload_success', 'true', time() + (86400 * 30), "/"); // Cookie for 30 days
        echo "User added successfully.";
    } else {
        echo "Error adding user: " . $result['message'];
    }
}
?>