<?php
/* Classe Outils en lien avec l'entité utilisateur
	composée de méthodes statiques
*/
// SY OMAR
class utilisateurTable {
public static function getUserByLoginAndPass($login,$pass){
	$em = dbconnection::getInstance()->getEntityManager();
	$userRepository = $em->getRepository('utilisateur');
	$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));	
	
	if ($user == false){
		//echo 'Erreur sql';
		return null;
	}
	return $user; 
}
public static function getUserById($id){
	$em = dbconnection::getInstance()->getEntityManager();
	$userRepository = $em->getRepository('utilisateur');
	$user = $userRepository->findOneBy(array('id' => $id));	
	
	if ($user == false){
		//echo 'Erreur sql';
		return null;
	}
	return $user; 
}
public static function getUsers(){
	$em = dbconnection::getInstance()->getEntityManager();
	$userRepository = $em->getRepository('utilisateur');
	$users = $userRepository->findAll();	
	
	if ($users == false){
		//echo 'Erreur sql';
		return null;
	}
	return $users; 
}
	public static function setStatut($id,$statut)
	{
		$user = self::getUserById($id);
		if($user == null)
			return false;
		else{
			$user->statut = $statut;
			$em = dbconnection::getInstance()->getEntityManager();
			$em->persist($user);
			$em->flush();
			return true;
		}
	}

    public static function setPP($id,$avatar)
    {
        $user = self::getUserById($id);
        if($user == null)
            return false;
        else{
            if($avatar != "")
                $user->avatar = "https://pedago02a.univ-avignon.fr/~uapv1601678/Click/app/image/profil/".$avatar;
            $em = dbconnection::getInstance()->getEntityManager();
            $em->persist($user);
            $em->flush();
            return true;
        }
    }
}
?>