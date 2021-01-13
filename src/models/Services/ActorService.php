<?php

namespace PhpMvcObjet\models\Services;


use PhpMvcObjet\models\DAO\ActorDao;
use PhpMvcObjet\models\Entities\Actor;



class ActorService
{
    private $actorDao;

    public function __construct()
    {
        $this->actorDao = new ActorDao();
    }

    public function getAllActors()
    {
        $actors = $this->actorDao->findAll();
        return $actors;
    }
    public function getOneActor($id)
    {
        $actor = $this->actorDao->findById($id);
        return $actor;
    }
}
