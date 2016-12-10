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

	public static function addChat($text, $user) {

        $em = dbconnection::getInstance()->getEntityManager();
        echo "ici ok 1";
        $chat = new chat();
        echo "ici ok 2";
        $post = new Post();
        echo "ici ok 3";
        $post->texte = $text;
        echo "ici ok 4";
        $post->date = new DateTime();
        $chat->emetteur = $user;
        echo "ici ok 5";
        $chat->post = $post;
        echo "ici ok 6";
        $em->persist($chat);
        $em->flush();
    }


}

?>