<?php
namespace m2i\app\model;

use m2i\framework\EntityInterface;

class Author implements EntityInterface {

    private ?int $id = null;

    private string $authorName;

    
    /**
     * Get the value of id
     */ 
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of authorName
     */ 
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * Set the value of authorName
     *
     * @return  self
     */ 
    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }
}