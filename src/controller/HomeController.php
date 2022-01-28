<?php
namespace m2i\app\controller;

use m2i\framework\AbstractController;

class HomeController extends AbstractController{

    public function index(){
        echo json_encode(
            $this->container["dao.post"]->findAll()->getAllAsArray()
        );
    }

    public function list(){
        echo "Liste des news";
    }

    public function details($id, $title){
        $query = $this->container["dao.post"]->findOneById($id);
        echo json_encode(
            $query->getOneAsArray()
        );
    }

}