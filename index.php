<?php
session_start();
// phpinfo();
define("BASE_URL",'/garrage');

// inclusion des classes
require_once 'models/Router.php';
require_once 'models/DataBase.php';

require_once 'controllers/HomeController.php';
require_once 'controllers/AdministrationController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/ServicesController.php';
require_once 'controllers/ModifServiceController.php';
require_once 'controllers/UsedCarController.php';
require_once 'controllers/TestimonialController.php';


//instanciation des classes
$router = new Router();



//Définition des routes 
$router->addRoute("GET",BASE_URL.'/','HomeController','index');
$router->addRoute("GET",BASE_URL.'/administration','AdministrationController','index');
$router->addRoute("GET",BASE_URL.'/login','LoginController','index');
$router->addRoute("GET",BASE_URL.'/services','ServicesController','index');
$router->addRoute("GET",BASE_URL.'/modification_des_services','ModifServiceController','index');
$router->addRoute("GET",BASE_URL.'/occasions','UsedCarController','index');
$router->addRoute("GET",BASE_URL.'/temoignage','TestimonialController','index');

$router->addRoute("GET",BASE_URL.'/reboot','AdministrationController','reboot');
$router->addRoute("POST",BASE_URL.'/reboot','AdministrationController','reboot');

$router->addRoute("POST",BASE_URL.'/','HomeController','message');
$router->addRoute("POST",BASE_URL.'/occasions','UsedCarController','action');
$router->addRoute("POST",BASE_URL.'/temoignage','TestimonialController','action');

$router->addRoute("POST",BASE_URL.'/verification','LoginController','verification');
$router->addRoute("GET",BASE_URL.'/mpdOublie','LoginController','mpdOublie');
$router->addRoute("GET",BASE_URL.'/envoyerCode','LoginController','envoyerCode');
$router->addRoute("GET",BASE_URL.'/verifierCode','LoginController','verifierCode');
$router->addRoute("GET",BASE_URL.'/nouveauMdp','LoginController','nouveauMdp');

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


?>