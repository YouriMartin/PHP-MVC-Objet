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
    private $genreDao;
    private $actorDao;
    private $directorDao;

    public function __construct()
    {

        $this->movieDao = new MovieDao();
        $this->genreDao = new GenreDao();
        $this->directorDao = new DirectorDao();
        $this->actorDao = new ActorDao();
    }
    public function getAllMovies()
    {
        $movie = $this->movieDao->findAll();
        return $movie;
    }

    public function getOneMovie($id)
    {

        $movie = $this->movieDao->findById($id);
        //print_r($movie);

        $genre = $this->genreDao->findByMovie($id);
        $movie->setGenre($genre);
        //print_r($movie);
        $director = $this->directorDao->findByMovie($id);
        $movie->setDirector($director);

        $actors = $this->actorDao->findByMovie($id);
        $movie->setActor($actors);


        return $movie;
    }

    public function create($movieData)
    {

        $movie = $this->movieDao->createObjectFromFields($movieData);

        $genre = $this->genreDao->findByMovie($movieData['genre']);
        $movie->setGenre($genre);

        $director = $this->directorDao->findByMovie($movieData['director']);
        $movie->setDirector($director);

        $this->movieDao->create($movie);
    }
}
