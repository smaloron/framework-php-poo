<?php
namespace m2i\framework;

class Router {

    private string $url;
    
    private string $queryString = "";

    private array $routes = [];

    private string $controllerName;

    private string $methodName;

    private array $params = [];

    public function __construct(array $routes) {

        $this->routes = $routes;

        $uri = filter_input(INPUT_SERVER, "REQUEST_URI");
        $parts = explode("?", $uri);
        $this->url = $parts[0];
        if(count($parts) > 1) {
            $this->queryString = $parts[1];
        }

        $this->parseUrl();
    }

    private function parseUrl() {
        $found = false;
        foreach($this->routes as $route => $target){
            $regex = "#^{$route}$#";
            if(preg_match($regex, $this->url, $matches)){
                
                array_shift($matches);
                $this->params = $matches;

                $this->controllerName = $target[0];
                $this->methodName = $target[1];
                $found = true;
                break;
            }
        }

        if(! $found){
            throw new NotFoundException("La route n'a pas été trouvée");
        }
    }

    public function run(array $container){

        $controller = new $this->controllerName(
            new Request($this->queryString),
            $container
        );
        $action = $this->methodName;
        $controller->$action(... $this->params);
    }


}