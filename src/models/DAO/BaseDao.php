<?php

namespace PhpMvcObjet\models\DAO;

use PDO;

class BaseDao{

    protected $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=object', 'root', 'root');
    }
}