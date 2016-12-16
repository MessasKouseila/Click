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
	public function getChatsAfterId() {
		
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

	public function getLastChats($id) {
		$em = dbconnection::getInstance()->getEntityManager();
		$qb = $em->createQueryBuilder();
		$qb->select('c')
			->from('chat', 'c')
			->where('c.id > :id')
			->setParameter('id', $id);
		return $qb
			->getQuery()
			->getResult();
	}

	public static function addChat($text, $user) {

        $em = dbconnection::getInstance()->getEntityManager();
        $chat = new chat();
        $post = new Post();
        $post->texte = $text;
        $post->date = new DateTime();
        $chat->emetteur = $user;
        $chat->post = $post;
        $em->persist($chat);
        $em->flush();
    }
}

?>