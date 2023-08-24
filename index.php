<?php

define("BASE_URL",'/garrage');

// inclusion des classes
require_once 'models/Router.php';
require_once 'controllers/HomeController.php';

//instanciation des classes
$router = new Router();

//Définition des routes 
$routes = $router->addRoute("GET",BASE_URL.'/','HomeController','index');
$routes = $router->addRoute("GET",BASE_URL.'/Administration','AdministrationController','index');
$routes = $router->addRoute("GET",BASE_URL.'/Login','LoginController','index');
$routes = $router->addRoute("GET",BASE_URL.'/Services','ServicesController','index');
$routes = $router->addRoute("GET",BASE_URL.'/Modification_des_services','ModifServiceController','index');
$routes = $router->addRoute("GET",BASE_URL.'/Occasion','UserCarController','index');
$routes = $router->addRoute("GET",BASE_URL.'/Temoignage','TestimonialController','index');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$handler = $router->getHandler($method,$uri);
// handler = [mehtode=>"GET",controller=>"HomeController",action=>"index"]

if ($handler === NULL){

    header('HTTP/1.1 404 not found');
    exit();
}

//Appel du controller
$controller = new $handler['controller']();
$action = $handler["action"];
$controller->$action();