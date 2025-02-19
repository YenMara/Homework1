<?php 
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../database/db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $avatar = $_FILES['avatar'] ?? null;

    if (empty($username) || empty($email)) {
        die("Username and Email are required.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    if (!$avatar || $avatar['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading file.");
    }

    $uploadDir = __DIR__ . "/../../storage/avatars/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $originalFileName = basename($avatar["name"]);
    $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
    $newFileName = uniqid("avatar_", true) . "." . $imageFileType;
    $targetFile = $uploadDir . $newFileName;

    $check = getimagesize($avatar["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }
    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedExtensions)) {
        die("Only JPG, JPEG, PNG, and GIF files are allowed.");
    }
    if ($avatar["size"] > 500000) {
        die("Sorry, your file is too large.");
    }
    if (!move_uploaded_file($avatar["tmp_name"], $targetFile)) {
        die("Error moving uploaded file.");
    }

    try {
        $user = new User($conn);
        $query = "INSERT INTO users (username, email, avatar) VALUES (:username, :email, :avatar)";
        $params = ['username' => $username, 'email' => $email, 'avatar' => $newFileName];
        $result = $user->executeQuery($query, $params);

        if (!$result['status']) {
            die("Error adding user: " . $result['message']);
        }

        setcookie('upload_success', 'true', time() + (86400 * 30), "/");
        echo "User and image uploaded successfully.";
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
?>