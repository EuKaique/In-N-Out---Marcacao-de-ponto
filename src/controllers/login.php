<?php

loadModel('Login');

$exception = null;

if(count($_POST) > 0){
    $login = new Login($_POST);

    try {
        $user = $login->checkLogin();

        $uri = urldecode($_SERVER['REQUEST_URI']);

        if($uri === '/innout/public/' || $uri === '' || $uri === 'innout/public/index.php'){
            $uri = 'day_records.php';
        }

        header("Location: /$uri");
        
    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);