<?php

require_once "vendor/autoload.php";

use PhpMvcObjet\controllers\BackController;
use PhpMvcObjet\controllers\FrontController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/src/views');
$twig = new Environment($loader, ['cache' => false]);

$fc = new FrontController($twig);
$bc = new BackController();

$base = dirname($_SERVER['PHP_SELF']);

if (ltrim($base, '/')) {
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}



$klein = new \Klein\Klein();


$klein->respond('GET', '/', function () use ($fc) {
    $fc->acceuil();
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
    $id = $request->id;
    $fc->Oneactor($id);
});

$klein->respond('GET', '/directors', function () use ($fc) {
    // use est une manière d'effectuer une closure en PHP 
    $fc->directors();
});

$klein->respond('GET', '/directors/[:id]', function ($request) use ($fc) {
    $id = $request->id;
    $fc->Onedirector($id);
});

$klein->respond('GET', '/movies', function () use ($fc) {

    $fc->movies();
});

$klein->respond('GET', '/movies/[:id]', function ($request) use ($fc) {
    $fc->movie($request->id);
});

$klein->respond('GET', '/addFMovie', function () use ($fc) {
    $fc->Formaddmovie();
});

$klein->respond('POST', '/addMovie', function ($request) use ($bc, $fc) {
    $bc->addMovie($request->paramsPost());
    $fc->acceuil();
});

$klein->dispatch();
