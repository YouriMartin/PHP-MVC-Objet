<?php

namespace PhpMvcObjet\controllers;

use PhpMvcObjet\models\Services\GenreService;
use PhpMvcObjet\models\Services\ActorService;

use Twig\Environment;

class FrontController
{
    private $twig;
    private $genreService;
    private $actorService;

    public function __construct($twig)
    {
        // instanciation du service Genre
        $this->genreService = new GenreService();
        $this->actorService = new ActorService();
        $this->twig = $twig;
    }

    public function genres()
    {
        /* 
         sur la version précédente j'utilisais DAO directement , ici on passe par les services
             avant :$genreDao = new GenreDao();
                    $genres = $genreDao->findAll();
       */
        $genres = $this->genreService->getAllGenres();
        /*  foreach ($genres as $genre) {
            echo $genre->getName();
        }*/

        /*  include_once __DIR__ . '/../views/GenreViews.php';*/

        echo $this->twig->render('genre.html.twig', ["genres" => $genres]);
    }

    public function actors()
    {
        $actors = $this->actorService->getAllActors();

        echo $this->twig->render('actor.html.twig', ["actor1" => $actors]);
    }

    public function Oneactor($url)
    {
        $actors = $this->actorService->getAllActors();
        $oneactor =  $actors[$url];
        echo $this->twig->render('actor.html.twig', ["oneactor1" => $oneactor]);
    }
}
