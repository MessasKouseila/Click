<?php

//nom de l'application
$nameApp = "Click";

// Inclusion des classes et librairies
require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';


//action par défaut
$action = "index";

if(key_exists("action", $_REQUEST))
	$action =  $_REQUEST['action'];

session_start();

$context = context::getInstance();
$context->init($nameApp);

$view=$context->executeAction($action, $_REQUEST);

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view===false){
	echo "Une grave erreur s'est produite, il est probable que l'action ".$action." n'existe pas...";
	die;
}

//inclusion du layout qui va lui meme inclure le template view
elseif($view!=context::NONE){
	if( isset($context->template))
	foreach ($context->template as $key=>$value) {
		$template_view[$value] = $nameApp."/view/".$value.$context->executeAction($value, $_REQUEST).".php";
	}
	$template_view[$action]=$nameApp."/view/".$action.$view.".php";
	include($nameApp."/view/".$context->getLayout().".php");
	
}

?>
