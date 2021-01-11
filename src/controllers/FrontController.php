<?php

namespace PhpMvcObjet\controllers;

use PhpMvcObjet\models\Services\GenreService;
use Twig\Environment;

class FrontController
{
    private $twig;
    private $genreService;

    public function __construct($twig)
    {
        // instanciation du service Genre
        $this->genreService = new GenreService();
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
}
