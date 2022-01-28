<?php

namespace m2i\app\dao;

use m2i\framework\AbstractDAO;
use m2i\app\model\Post;
use m2i\framework\EntityInterface;
use \PDO;

class PostDAO extends AbstractDAO {

    private ?AuthorDAO $authorDAO = null;

    public function __construct(PDO $pdo){
        parent::__construct($pdo, "posts", Post::class);
        $this->foreignKeys = ["author"];
    }

    public function getAuthorDAO(): AuthorDAO {
        if($this->authorDAO == null){
            $this->authorDAO = new AuthorDAO($this->pdo);
        }
        return $this->authorDAO;
    }

    public function hydrate(array $data)
    {
        $post = parent::hydrate($data);

        $authorDAO = $this->getAuthorDAO();
        $post->setAuthor($authorDAO
            ->findOneById($data["author_id"])
            ->getOneAsObject()
        );

        $post->setAnswers(
            $this ->find(["parent_id" => $data["id"]])
                  ->getAllAsObject()
        );


        return $post;
    }

    protected function manageAssociation(Post $post): void{
        $author = $post->getAuthor();
        if($author){
            $authorDAO = $this->getAuthorDAO();
            $authorDAO->save($author);
        }
    }

    public function update(EntityInterface $entity): void{
        $this->manageAssociation($entity);
        parent::update($entity);
    }

    public function insert(EntityInterface $entity): void{
        $this->manageAssociation($entity);
        parent::insert($entity);
    }

}