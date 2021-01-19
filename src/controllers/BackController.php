<?php

namespace PhpMvcObjet\controllers;

use PhpMvcObjet\models\services\MovieService;

class BackController
{
    private $movieService;

    public function __construct()
    {
        $this->movieService = new MovieService();
    }

    public function addMovie($movieData)
    {
        
        $this->movieService->add($movieData);
    }
    
}
