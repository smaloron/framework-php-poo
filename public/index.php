<?php

use League\CommonMark\CommonMarkConverter;
use m2i\app\model\Author;
use m2i\app\model\Post;
use m2i\app\dao\AuthorDAO;
use m2i\app\dao\PostDAO;
use m2i\framework\Router;
use m2i\app\controller\HomeController;

require "../vendor/autoload.php";

$pdo = new PDO(
    "mysql:host=localhost;dbname=forum_2022;charset=utf8",
    "root", "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// Table de routage
$routes = [
    "/accueil" => [HomeController::class, "index"],
    "/quoi-de-neuf" => [HomeController::class, "list"],
    "/details/(\d+)/([a-z]+)" => [HomeController::class, "details"]
];

$container = [];
$container["pdo"] = $pdo;
$container["dao.post"] = new PostDAO($pdo);

$router = new Router($routes);
$router->run($container);



//var_dump($_SERVER);

/*
$author = new Author();
$author->setAuthorName('Bérénice Abbot');

$postDAO = new PostDAO($pdo);

$post = new Post();
$post   ->setTitle("Easy PHP")
        ->setContent("## Utilise plutôt EasyPHP")
        ->setParentId(1)
        ->setAuthor($author);

$postDAO->save($post);

var_dump($post);
*/
//var_dump($postDAO->findAll()->getAllAsObject());

/*
$authorDAO = new AuthorDAO($pdo);
$authorDAO->save($author);
var_dump($authorDAO->findAll()->getAllAsObject());

$markDown = new CommonMarkConverter();

$message = "# Hello
- item 1
- item 2
";

echo $markDown->convert($message);
*/