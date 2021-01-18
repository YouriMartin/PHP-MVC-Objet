<?php

namespace PhpMvcObjet\controllers;

use PhpMvcObjet\models\services\MovieService;
use Twig\Environment;

class BackController
{
    private $movieService;
    private $twig;
    public function __construct($twig)
    {
        $this->movieService = new MovieService();
        $this->twig = $twig;
    }

    public function addMovie($movieData)
    {
        $this->movieService->add($movieData);
        echo $this->twig->render('addmovie.html.twig');
    }
}
