<?php
namespace m2i\framework;


interface EntityInterface {

    public function getId(): ?int;

    public function setId(int $id):self;
}