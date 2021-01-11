<?php

require_once "vendor/autoload.php";

use PhpMvcObjet\Controllers\FrontController;

$fc = new FrontController();

$base = dirname($_SERVER['PHP_SELF']);

if (ltrim($base, '/')) {
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}



$klein = new \Klein\Klein();

$klein->respond('GET', '/toto', function () {
    return 'Hello toto !!!!';
});

$klein->respond('GET', '/jam', function () {
    return 'Hello jam !!!!';
});

$klein->respond('GET', '/genres', function () use ($fc) {
    // use est une manière d'effectuer une closure en PHP 
    $fc->genres();
});

$klein->dispatch();
