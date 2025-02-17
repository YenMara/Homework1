<?php
    require './model/User.php';

    $user = new User($conn);
    if (isset($_POST['email'])) {
        $query = 'SELECT email FROM users WHERE email = :email';
        $params = ['email' => $_POST['email']];
        $res = $user->show($query, $params);
        echo json_encode($res);
    }
?>