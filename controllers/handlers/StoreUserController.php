<?php
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = $_POST;
    $file = $_FILES['avatar'];

    $errors = [];
    if (empty($formData['username']) || empty($formData['email'])) {
        $errors[] = "Username and email are required.";
    }

    $uploadDir = './storage/avatars/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $avatarPath = null;
    if ($file['error'] === UPLOAD_ERR_OK) {
        $filename = basename($file['name']);
        $avatarPath = $uploadDir . $filename;

        if (!move_uploaded_file($file['tmp_name'], $avatarPath)) {
            $errors[] = "Failed to upload avatar.";
        }
    }

    if (empty($errors)) {
        $user = new User($conn);
        $query = "INSERT INTO users (username, email, avatar) VALUES (:username, :email, :avatar)";
        $params = [
            'username' => $formData['username'],
            'email' => $formData['email'],
            'avatar' => $avatarPath ? $filename : null,
        ];

        $result = $user->executeQuery($query, $params);
        if ($result['status']) {
            $userId = $conn->lastInsertId();
            if ($avatarPath) {
                $query = "INSERT INTO images (path, user_id) VALUES (:path, :user_id)";
                $params = ['path' => $avatarPath, 'user_id' => $userId];
                $user->executeQuery($query, $params);
            }
            setcookie('upload_success', 'true', time() + (86400 * 30), "/"); 
            header('Location: /');
        } else {
            echo "Error adding user: " . $result['message'];
        }
    } else {
        header('Location: /');
        exit;
    }
}
?>