<?php

namespace PhpMvcObjet\models\Services;


use PhpMvcObjet\models\DAO\GenreDao;
use PhpMvcObjet\models\Entities\Genre;



class GenreService
{
    private $genreDao;

    public function __construct()
    {
        $this->genreDao = new GenreDao();
    }

    public function getAllGenres()
    {
        $genres = $this->genreDao->findAll();
        return $genres;
    }
}
