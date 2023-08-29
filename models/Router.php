<?php
class Router { 
    private $routes;
    
    public function __construct() {
        $this->routes = [];
    }

    public function addRoute(string $method,string $path, string $controller, string $action)  { 
     $this->routes [] = [
        'method' => $method,
        'path' => $path,
        'controller' =>$controller,
        'action' => $action
     ];    
    }

    public function getHandler(string $method, string $uri) { 
        foreach($this->routes as $route) {
            if($route['method'] === $method && $route['path'] === $uri) {
                return [
                'method' => $route['method'],
                'controller' => $route['controller'],
                'action' =>$route['action'],
                ];

            }elseif(substr($route['path'],0,strlen(BASE_URL)+10) === substr($uri,0,strlen(BASE_URL)+10) && basename($route['path']) == "*"){
                // var_dump($route['path'],18);
                
                // echo "ca passe dans le routeur pour occasionPlus";
                return [
                    'method' => $route['method'],
                    'controller' => $route['controller'],
                    'action' =>$route['action'],
                    ]; 
            }
        }
    //erreur 404
    return null;
    }   
}