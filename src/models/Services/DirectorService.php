<?php

namespace PhpMvcObjet\models\Services;


use PhpMvcObjet\models\DAO\DirectorDao;
use PhpMvcObjet\models\Entities\Director;



class DirectorService
{
    private $directorDao;

    public function __construct()
    {
        $this->directorDao = new DirectorDao();
    }

    public function getAllDirectors()
    {
        $directors = $this->directorDao->findAll();
        return $directors;
    }
}
