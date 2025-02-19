<?php
function validationIsset($req)
{
    $errors = [];
    foreach ($req as $key => $val) {
        if ($key == 'email') {
            if (!filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {$errors[$key] = "Invalid email format";}
        } else if (!isset($req[$key]) || empty($req[$key])) {
            $errors[$key] = $key . " is required";
        }
    }
    return $errors;
}
function deleteAvatar($user, $user_id)
{
    $ImageQuery = "SELECT id, avatar FROM users where id = :id";
    $imagePara = ['id' => $user_id];
    $image = $user->show($ImageQuery, $imagePara);
    $filename = basename($image['data']['avatar']);
    $uploadDir = './storage/avatars/';
    $path = $uploadDir . $filename;
    
    if (file_exists($path)) {
        unlink($path);
    }
}
