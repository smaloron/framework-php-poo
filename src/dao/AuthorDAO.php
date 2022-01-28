<?php
namespace m2i\app\dao;

use m2i\app\model\Author;
use m2i\framework\AbstractDAO;
use \PDO;

class AuthorDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "authors", Author::class);  
    }

}
