<?php

define ('HOST', 'pedago02a.univ-avignon.fr') ;
define ('USER', 'uapv1600147'  ) ;
define ('PASS', '1KVQZb' ) ;
define ('DB', 'etd' ) ;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class dbconnection{

private static $instance=null, $entityManager;
private $error=null ;

private function __construct(){
	$config = Setup::createAnnotationMetadataConfiguration(array("../../monApplication/model/"), true);

	$param = array(
	'dbname' => DB,
	'user'	=> USER,
	'password' => PASS,
	'host'	=> HOST,
	'driver' => 'pdo_pgsql');
	
	try{
		self::$entityManager = EntityManager::create($param, $config);
	}
	catch(Exception $e) {
		echo "Probleme connexion base de données:".$e->getMessage();
		$this->error = $e->getMessage();
	}

}	

public static function getInstance(){
	if(self::$instance == null){
		self::$instance = new dbconnection();
	}
	return self::$instance;
}

public function closeConnection(){
	self::$instance=null;
}

public function getEntityManager(){
	if(!empty(self::$entityManager)) 
		return self::$entityManager;
	else 
		return NULL;
}


public function __clone(){
	
}

public function getError(){
	return $this->error;
}

}
