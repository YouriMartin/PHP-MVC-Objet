<?php

namespace PhpMvcObjet\models\Services;


use PhpMvcObjet\models\DAO\ActorDao;
use PhpMvcObjet\models\DAO\DirectorDao;
use PhpMvcObjet\models\DAO\GenreDao;
use PhpMvcObjet\models\DAO\MovieDao;

use PhpMvcObjet\models\Entities\Actor;
use PhpMvcObjet\models\Entities\Director;
use PhpMvcObjet\models\Entities\Genre;
use PhpMvcObjet\models\Entities\Movie;




class MovieService
{
    private $movieDao;
    private $actorDao;
    private $genreDao;
    private $directorDao;

    public function __construct()
    {
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->directorDao = new DirectorDao();
        $this->genreDao = new GenreDao();
    }

    public function getAllMovies()
    {
        $movies = $this->movieDao->findAll();
        return $movies;
    }

    public function getbyId($id)
    {
        $movie = $this->movieDao->findById($id);
        return $movie;


        $actors = $this->actorDao->findByMovie($id);
        foreach ($actors as $actor) {
            $movie->addActor($actor);
        }

        $genre = $this->genreDao->findByMovie($id);
        $movie->setGenre($genre);

        $director = $this->directorDao->findByMovie($id);
        $movie->setDirector($director);

        $comments = $this->commentDao->findByMovie($id);

        return [
            'movie' => $movie
        ];
    }
}
