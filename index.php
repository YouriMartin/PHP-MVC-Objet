<?php

require_once "vendor/autoload.php";


$base = dirname($_SERVER['PHP_SELF']);

if (ltrim($base, '/')) {
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}



$klein = new \Klein\Klein();

$klein->respond('GET', '/hello-world', function () {
    return 'Hello World !!!!';
});

$klein->dispatch();
