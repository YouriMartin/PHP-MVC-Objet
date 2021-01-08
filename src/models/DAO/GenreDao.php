<?php

namespace PhpMvcObjet\models\DAO;

use MvcPhpObjet\models\Entities\Genre;

class GenreDao extends BaseDao
{

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id = :id");

        $res = $stmt->execute([':id' => $id]);

        if ($res) {
            return $stmt->fetchObject(Genre::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
}
