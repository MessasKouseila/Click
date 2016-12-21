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
		$messages = $userRepository->findBy(
			array(),
			array('id' => 'desc')

		);
	
		if ($messages == false){
			return null;
		}
		return $messages; 
	}
	public static function getMessagesAfterId($id) {
		$em = dbconnection::getInstance()->getEntityManager();
		$qb = $em->createQueryBuilder();
		$qb->select('m')
			->from('message', 'm')
			->where('m.id > :id')
			->orderBy('m.id', 'DESC')
			->setParameter('id', $id);
		return $qb
			->getQuery()
			->getResult();
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

	public static function getMessageById($id){
		$em = dbconnection::getInstance()->getEntityManager();

		$messageRepository = $em->getRepository('message');
		$message = $messageRepository->findOneBy(array('id' => $id));

		if ($message == false){
			return null;
		}
		return $message;
	}
	public static function aimer($id)
	{
		$message = self::getMessageById($id);
		if($message == null)
			return false;
		else{
			$message->aime = $message->aime + 1;
			$em = dbconnection::getInstance()->getEntityManager();
			$em->persist($message);
			$em->flush();
			return true;
		}

	}
	public static function partager($idmessage,$iduser)
	{
		$message = self::getMessageById($idmessage);
		$user = utilisateurTable::getUserById($iduser);
		$partagerMessage = new message();
		if($message == null && $user == null)
			return false;
		else{
			$partagerMessage->aime = 0;
			$partagerMessage->destinataire = $user;
			$partagerMessage->emetteur = $user;
			$partagerMessage->parent = $message->parent;
			$partagerMessage->post = $message->post;
			$em = dbconnection::getInstance()->getEntityManager();
			$em->persist($partagerMessage);
			$em->flush();
			return true;
		}

	}

}

?>
