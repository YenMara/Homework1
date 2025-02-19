<?php
    require './models/User.php';
    
    $user = new User($conn);
    $query = 'SELECT * FROM users';

    $users = $user->GetAllUsers($query);

    $q2 = 'SELECT * FROM users WHERE id = :id';
    $params = ['id' => 1];

    $item = $user->GetAllUsers($q2, $params);

    // print_r($item);
    require "./views/pages/HomePage.php";
?>