<?php

require_once "vendor/autoload.php";

use PhpMvcObjet\controllers\FrontController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/src/views');
$twig = new Environment($loader, ['cache' => false]);

$fc = new FrontController($twig);

$base = dirname($_SERVER['PHP_SELF']);

if (ltrim($base, '/')) {
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}



$klein = new \Klein\Klein();


$klein->respond('GET', '/jam', function () {
    return 'Hello jam !!!!';
});

$klein->respond('GET', '/genres', function () use ($fc) {
    // use est une manière d'effectuer une closure en PHP 
    $fc->genres();
});

$klein->respond('GET', '/actors', function () use ($fc) {
    // use est une manière d'effectuer une closure en PHP 
    $fc->actors();
});

$klein->respond('GET', '/actors/[:id]', function ($request) use ($fc) {
    $url = $request->id;
    $fc->Oneactor($url);
});

$klein->respond('GET', '/directors', function () use ($fc) {
    // use est une manière d'effectuer une closure en PHP 
    $fc->directors();
});

$klein->respond('GET', '/directors/[:id]', function ($request) use ($fc) {
    $directorId = $request->id;
    $fc->Onedirector($directorId);
});

$klein->dispatch();
