<?php


session_start();
session_destroy();

require_once('../config/config.php');

$uri = urldecode($_SERVER['REQUEST_URI']);

if($uri === 'logout.php' || $uri === 'localhost/logout.php' || $uri === '/innout/public/' || $uri === '' || $uri === 'innout/public/index.php'){
    $uri = 'login.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");