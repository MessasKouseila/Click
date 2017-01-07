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

	public static function addMessage($emetteur,$destinataire,$text,$avatar)
	{
		$message = new message();
		$message->emetteur = $emetteur;
		$message->destinataire = $destinataire;
		$message->parent = $emetteur;
		$message->aime = 0;
		$post = new Post();
		$post->texte = $text;
		$post->date = new DateTime();
		$message->post = $post;
		if($avatar != "")
			$post->image = "https://pedago02a.univ-avignon.fr/~uapv1601678/Click/app/image/images/".$avatar;
		$em = dbconnection::getInstance()->getEntityManager();
		$em->persist($message);
		$em->flush();


	}
}

?>
