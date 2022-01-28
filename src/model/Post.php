<?php

namespace m2i\app\model;

use m2i\framework\EntityInterface;
use \DateTime;

class Post implements EntityInterface {

    private ?int $id = null;

    private string $title;

    private string $content;

    private DateTime $createdAt;

    private Author $author;

    private int $parentId;

    private array $answers = [];

    public function __construct(){
        $this->createdAt = new DateTime();
    }

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
     * Get the value of title
     */ 
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title) : self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = new DateTime($createdAt);

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor(Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of parent
     */ 
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * Set the value of parent
     *
     * @return  self
     */ 
    public function setParentId(int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get the value of answers
     */ 
    public function fectchAnswers(): array
    {
        return $this->answers;
    }

    /**
     * Set the value of answers
     *
     * @return  self
     */ 
    public function setAnswers(array $answers): self
    {
        $this->answers = $answers;

        return $this;
    }
}