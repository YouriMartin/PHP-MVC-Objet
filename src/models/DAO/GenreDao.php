<?php

namespace PhpMvcObjet\models\DAO;

use PhpMvcObjet\models\Entities\Genre;

class GenreDao extends BaseDao
{

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM genre ");
        $res = $stmt->execute();
        if ($res) {
            $genres = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $genres[] = $this->createObjectFromFields($row);
            }
            return $genres;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    public function findById()
    {
    }
    public function createObjectFromFields($fields): genre
    {
        //
        // liaison entre la donnée BDD et l'objet 
        // ici on voit le chainage ->setId->setName 
        //
        $genre = new genre();
        $genre->setId($fields['id'])
            ->setname($fields['name']);

        return $genre;
    }
}
