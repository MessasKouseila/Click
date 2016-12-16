<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {
	// retourne les messages destiner à l'utilisateur identifier par l'id donner en @param
	public static function getUserMessageById($id){
		
		$user = utilisateurTable::getUserById($id);
		if(isset($user))
		{
			// Doctrine  Lazy Loading, les messages ne sont charges que si on les demande
			return $user->messages;
		}
		else
		{
			return null;
		}
	}
	public static function getMessages(){
		$em = dbconnection::getInstance()->getEntityManager();

		$userRepository = $em->getRepository('message');
		$messages = $userRepository->findAll();	
	
		if ($messages == false){
			echo 'Erreur sql';
		}
		return $messages; 
	}
}

?>
