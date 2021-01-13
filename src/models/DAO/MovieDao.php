<?php

namespace PhpMvcObjet\models\DAO;

use PhpMvcObjet\models\Entities\Movie;

class MovieDao extends BaseDao
{

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM movie ");
        $res = $stmt->execute();
        if ($res) {
            $movies = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $movies[] = $this->createObjectFromFields($row);
            }
            return $movies;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM movie WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if ($res) {
            return $this->createObjectFromFields($stmt->fetch(\PDO::FETCH_ASSOC));
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields): movie
    {
        //
        // liaison entre la donnée BDD et l'objet 
        // ici on voit le chainage ->setId->setName 
        //
        $movie = new movie();
        $movie->setId($fields['id'])
            ->setTitle($fields['title'])
            ->setDescription($fields['description'])
            ->setDuration($fields['duration'])
            ->setDate($fields['date'])
            ->setCover_image($fields['cover_image']);

        return $movie;
    }
}
