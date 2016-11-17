<?php

// Chargement des librairies Doctrine2
require_once "core/vendor/autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Chargement des classes context et de connexion
require_once 'core/context.class.php' ;
require_once 'core/dbconnection.class.php' ;

// Chargement automatique de toutes les classes en lien avec le modèle de données
function autoloadClassModel($class){
        global $nameApp;
        require_once $nameApp . '/model/' . $class . '.class.php';
}
spl_autoload_register('autoloadClassModel');

?>