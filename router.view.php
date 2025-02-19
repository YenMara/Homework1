<?php
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    $router = [
        // pages
        '/' => './controllers/pages/HomeController.php',
        '/upload/users' => './controllers/pages/UploadPage.php',

        // handlers
        '/store/users' => './controllers/handlers/StoreUserController.php',
        '/check/email' => './controllers/handlers/CheckEmailController.php',

        // error handling
        '/404' => './controllers/pages/ErrorController',
    ];

    if (array_key_exists($uri, $router)) {
        include $router[$uri];
    }else {
        include $router['/404'];
    }
?>