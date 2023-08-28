<?php
session_start();
ini_set('upload_max_filesize','7M');
// phpinfo();

define("BASE_URL",'/garrage');
if (!file_exists('models/connect.csv')){
    require_once 'models/Init.php';
}else{
    


// inclusion des classes
require_once 'models/Router.php';
require_once 'models/DataBase.php';
require_once 'models/Code.php';

require_once 'controllers/HomeController.php';
require_once 'controllers/AdministrationController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/ServicesController.php';
require_once 'controllers/UsedCarController.php';
require_once 'controllers/TestimonialController.php';



//instanciation des classes
$router = new Router();



//Définition des routes 
$router->addRoute("GET",BASE_URL.'/deconexion','HomeController','unlog');
$router->addRoute("GET",BASE_URL.'/','HomeController','index');
$router->addRoute("GET",BASE_URL.'/administration','AdministrationController','index');
$router->addRoute("GET",BASE_URL.'/login','LoginController','index');
$router->addRoute("GET",BASE_URL.'/services','ServicesController','index');
$router->addRoute("GET",BASE_URL.'/occasions','UsedCarController','index');
$router->addRoute("GET",BASE_URL.'/temoignage','TestimonialController','index');

$router->addRoute("POST",BASE_URL.'/ajout/temoignage','TestimonialController','action');

$router->addRoute("GET",BASE_URL.'/reboot','AdministrationController','reboot');
$router->addRoute("POST",BASE_URL.'/reboot','AdministrationController','reboot');

$router->addRoute("POST",BASE_URL.'/','HomeController','message');
$router->addRoute("POST",BASE_URL.'/occasions','UsedCarController','action');
$router->addRoute("POST",BASE_URL.'/nouveau/temoignage','TestimonialController','action');

$router->addRoute("POST",BASE_URL.'/verification','LoginController','verification');
$router->addRoute("GET",BASE_URL.'/mpdOublie','LoginController','mpdOublie');
$router->addRoute("GET",BASE_URL.'/envoyerCode','LoginController','envoyerCode');
$router->addRoute("GET",BASE_URL.'/verifierCode','LoginController','verifierCode');
$router->addRoute("GET",BASE_URL.'/nouveauMdp','LoginController','nouveauMdp');

$router->addRoute("GET",BASE_URL.'/administration','AdministrationController','index');
$router->addRoute("GET",BASE_URL.'/reboot','AdministrationController','reboot');

$router->addRoute("GET",BASE_URL.'/nouvel/employee','AdministrationController','newEmployee');

$router->addRoute("GET",BASE_URL.'/nouveau/champ','AdministrationController','newField');

$router->addRoute("GET",BASE_URL.'/ajout/employee','AdministrationController','addNewEmployee');
$router->addRoute("GET",BASE_URL.'/ajout/voiture','AdministrationController','addNewCar');

$router->addRoute("GET",BASE_URL.'/ajout/voiture','AdministrationController','addNewCar');
$router->addRoute("GET",BASE_URL.'/ajout/voiture','AdministrationController','addNewCar');


$router->addRoute("GET",BASE_URL.'/modifier/occasion','AdministrationController','modifyCar');

$router->addRoute("GET",BASE_URL.'/modifier/horaires','AdministrationController','changeTimeTables');
$router->addRoute("GET",BASE_URL.'/modifier/services','AdministrationController','modifyService');

$router->addRoute("GET",BASE_URL.'/valider/temoignage','AdministrationController','validateTestimonial');
$router->addRoute("POST",BASE_URL.'/valider/temoignage','AdministrationController','validateTestimonial');
$router->addRoute("POST",BASE_URL.'/nouvel/employee','AdministrationController','newEmployee');

$router->addRoute("GET",BASE_URL.'/nouvelle/occasion','UsedCarController','newCar');
$router->addRoute("POST",BASE_URL.'/nouvelle/occasion','UsedCarController','newCar');

$router->addRoute("GET",BASE_URL.'/ajout/occasion','UsedCarController','addCar');
$router->addRoute("POST",BASE_URL.'/ajout/occasion','UsedCarController','addCar');

// $router->addRoute("GET",BASE_URL.'/ajout/caracteristique','AdministrationController','newCaracteristic');
// $router->addRoute("GET",BASE_URL.'/ajout/option','AministrationController','newOption');

$router->addRoute("GET",BASE_URL.'/ajout/champ','UsedCarController','addField');
$router->addRoute("POST",BASE_URL.'/ajout/champ','UsedCarController','addField');

$router->addRoute("GET",BASE_URL.'/nouvelle/caracteristique','UsedCarController','newField');
$router->addRoute("GET",BASE_URL.'/nouvelle/option','UsedCarController','newField');

$router->addRoute("GET",BASE_URL.'/ajout/employee','AdministrationController','addNewEmployee');
$router->addRoute("POST",BASE_URL.'/ajout/voiture','AdministrationController','addNewCar');
$router->addRoute("POST",BASE_URL.'/modifier/occasion','AdministrationController','modifyCar');
$router->addRoute("POST",BASE_URL.'/modifier/horaires','AdministrationController','changeTimeTables');




$router->addRoute("POST",BASE_URL.'/modifier/services/carrosserie','AdministrationController','modifyCarrosserie');
$router->addRoute("POST",BASE_URL.'/modifier/services/mecanique','AdministrationController','modifyMecanique');
$router->addRoute("POST",BASE_URL.'/modifier/services/entretien','AdministrationController','modifyEntretien');


$router->addRoute("GET",BASE_URL.'/modifier/services/carrosserie','AdministrationController','modifyCarrosserie');
$router->addRoute("GET",BASE_URL.'/modifier/services/mecanique','AdministrationController','modifyMecanique');
$router->addRoute("GET",BASE_URL.'/modifier/services/entretien','AdministrationController','modifyEntretien');

$router->addRoute("POST",BASE_URL.'/modifier','AdministrationController','modify');
$router->addRoute("GET",BASE_URL.'/modifier','AdministrationController','modify');


$router->addRoute("POST",BASE_URL.'/reserver','UsedCarController','newBook');
$router->addRoute("GET",BASE_URL.'/reserver','UsedCarController','newBook');

$router->addRoute("POST",BASE_URL.'/envoyer/code','LoginController','envoyerCode');
$router->addRoute("GET",BASE_URL.'/envoyer/code','LoginController','envoyerCode');

$router->addRoute("POST",BASE_URL.'/verifier/code','LoginController','verifierCode');
$router->addRoute("GET",BASE_URL.'/verifier/code','LoginController','verifierCode');

$router->addRoute("POST",BASE_URL.'/occasions/*','UsedCarController','occasionPlus');
$router->addRoute("GET",BASE_URL.'/occasions/*','UsedCarController','occasionPlus');

$router->addRoute("POST",BASE_URL.'/nouveau/mot_de_passe','LoginController','nouveauMdp');
$router->addRoute("GET",BASE_URL.'/nouveau/mot_de_passe','LoginController','nouveauMdp');


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$handler = $router->getHandler($method,$uri);
// handler = [mehtode=>"GET",controller=>"HomeController",action=>"index"]

if ($handler === NULL){
    require_once 'views/lost.php';
    header('HTTP/1.1 404 not found');

}else{

    //Appel du controller
    $controller = new $handler['controller']();
    $action = $handler["action"];
    $controller->$action();
}


}
?>