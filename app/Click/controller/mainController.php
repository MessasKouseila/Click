<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */
// modification pour tester le depot git




class mainController{

public static function helloWorld($request,$context){
	$context->mavariable="hello world";
	$context->notify ="ceci est un message d'erreur issue de l'action helloWorld";
	return context::SUCCESS;
}

public static function login($request,$context){

	
	if(context::getSessionAttribute("utilisateur") !== NULL) {
		return context::SUCCESS;
	}
	else {

		if(isset($request["login"], $request["passWord"])) {
			$user = utilisateurTable::getUserByLoginAndPass($request["login"],$request["passWord"]);
			if (!isset($user)) {
				$context->notify = "aucun utilisateur de ce type";
				return context::ERROR;
			}
			else {
				context::setSessionAttribute("utilisateur",$user);
				return context::SUCCESS;
			}
		}
		else {
			return context::ERROR;
		}
	}	
	
}
public static function logout($request,$context){
	session_destroy();
	$context->notify = "Vous etes bien deconnecte";
	return context::SUCCESS;
}
public static function listeUsers($request,$context){
	$context->users = utilisateurTable::getUsers();
	return context::SUCCESS;
}

    /* methode permetant d'afficher le dernier message posté sur le chat,
     * tous les messages reçu par l'utilisateur qui viens de se connecter
     */
public static function showMessage($request,$context) {
	$user = context::getSessionAttribute("utilisateur");
	if (isset($user)) {
		$id = $user->id;
		$messages = messageTable::getUserMessageById($id);
		$chat = chatTable::getLastChats();

		if (isset($chat) && isset($messages)) {
			$messageChat = postTable::getPostById($chat[0]->id);
			$context->lastChat = $chat[0];
			$context->lastMessageChat = $messageChat;	
			$context->messages = $messages;
			return context::SUCCESS;
		}
		else {
			return context::ERROR;
		}
	}
	else {
		return context::ERROR;
	}
}
public static function index($request,$context){
		
	return context::SUCCESS;
}

}
