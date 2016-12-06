<?php

/* Classe Outils en lien avec l'entité chat
	composée de méthodes statiques
*/
// MESSAS KOUSEILA
class chatTable {

	public static function getChats() {
		
		$em = dbconnection::getInstance()->getEntityManager();
		$chatRepository = $em->getRepository('chat');

		$chats = $chatRepository->findAll();
		if ($chats == false){
			echo 'Erreur sql';
		}
		return $chats;
	}

	public function getLastChats() {
		
		$em = dbconnection::getInstance()->getEntityManager();
		$chatRepository = $em->getRepository('chat');
		$chat = $chatRepository->findBy(
			array(),
			array('id' => 'desc'),
			1,
			0
		);
		if ($chat == false){
			echo 'Erreur sql sur la fonction getlastchat';
		}
		return $chat;	
	}

	public function setChat($user, $text){
        $em = dbconnection::getInstance()->getEntityManager();
        $chatRepository = $em->getRepository('chat');
        $chat = new chat();
        $chat->emetteur = $user;
        $post = new post();
        $post->texte = $text;
        $post->date = new DateTime();
        $chat->post = $post;
        $em->persist($chat);
        $em->flush();
    }


}

?>