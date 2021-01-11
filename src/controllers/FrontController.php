<?php

namespace PhpMvcObjet\controllers;

use PhpMvcObjet\models\Services\GenreService;

class FrontController
{
    private $genreService;

    public function __construct()
    {
        // instanciation du service Genre
        $this->genreService = new GenreService();
    }

    public function genres()
    {
        /* 
         sur la version précédente j'utilisais DAO directement , ici on passe par les services
             avant :$genreDao = new GenreDao();
                    $genres = $genreDao->findAll();
       */
        $genres = $this->genreService->getAllGenres();
        foreach ($genres as $genre) {
            echo $genre->getName();
        }
    }
}
