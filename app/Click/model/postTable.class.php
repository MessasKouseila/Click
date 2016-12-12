<?php

/* Classe Outils en lien avec l'entité post
	composée de méthodes statiques
*/

class postTable {
	public static function getPostById($id) {

		$em = dbconnection::getInstance()->getEntityManager();

		$postRepository = $em->getRepository('Post');
		$post = $postRepository->findOneBy(array('id' => $id));	
		
		if ($post == false){
			echo 'Erreur sql';
		}
		return $post; 
	}

}

?>