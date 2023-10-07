<?php

// on affiche tout ce qui est passé dans l'url (avec le rewriting ...)
var_dump($_GET);
echo "<br><br>";

// on récupère les variables globales pour ce script 

echo $_SERVER['SCRIPT_FILENAME'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";
echo "<br>";
// on définit des constantes pour appeller les scripts qqsoit le dossier de travail

define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));

echo ROOT ;
echo "<br>";
echo WEBROOT ; 
echo "<br><br>";

// on récupère la classe abstraite
echo $abstract_controller = ROOT.'core/controller.php';
require($abstract_controller);
echo "<br><br>";

// on récupère les infos de l'url en séparant chaque composant :
// le controller, sa méthode et ses paramètres
$params = explode('/',$_GET['p']);
var_dump($params);
echo "<br>";

// if (count($params) > 1) {

// }

// le premier me donne le controller a appeller 
$controller = $params[0];
// le deuxieme la méthode (l'action) à effectuer 
$method = $params[1];

if($params[2]){
    echo "j'ai passé des parametres ...";
    $args = $params[2] ;
}
else {
    $args = NULL ;
}

$called = 'controllers/'.$controller.'.php' ;
require($called);

// je vérifie que la méthode existe bien dans le controleur en question  
if( method_exists($controller , $method)){
    // on instancie le controlleur appellé dans l'url 
    $myctrl= new $controller();
    // j'appelle sa méthode appelée dans l'url 
    $myctrl->$method($args);
    // tuto->index() dans l'exempele 
    // on passe la main au controleur pour l'affichage ...
}
else {
    echo "méthode non existante ... erreur 404 ";
}