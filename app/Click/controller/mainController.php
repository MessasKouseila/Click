<?php
/*
 * All doc on : ddd
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController{

    public static function helloWorld($request,$context){
        $context->mavariable="hello world".utilisateurTable::getUsers()[1]->id;
        $context->notify ="ceci est un message d'erreur issue de l'action helloWorld";
        return context::SUCCESS;
    }

    public static function login($request,$context){


        if(context::getSessionAttribute("utilisateur") !== NULL) {
          $context->redirect("Click.php?action=index");  
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
               $context->redirect("Click.php?action=index"); 
                }
            }
            else {
                return context::ERROR;
            }
        }

    }
    public static function logout($request,$context){
        context::setSessionAttribute("utilisateur", NULL);
        $context->notify = "Vous etes bien deconnecte";
        $context->redirect("Click.php?action=login");
    }
    public static function showMessage($request,$context) {
        $user = context::getSessionAttribute("utilisateur");
        if (isset($user)) {
            //id = $user->id;
            $messages = messageTable::getUserMessageById(35);
            $context->messages = $messages;
            return context::SUCCESS;
        }
        else {
            return context::ERROR;
        }
    }

    public static function listeUsers($request,$context){
        $context->users = utilisateurTable::getUsers();
        return context::SUCCESS;
    }
    public static function profil($request,$context){
        $context->user = context::getSessionAttribute("utilisateur");
        return context::SUCCESS;
    }
    public static function menu($request,$context){
        return context::SUCCESS;
    }
    public static function  chat($request,$context){
        $context->allChats = chatTable::getChats();
        return context::SUCCESS;
    }
    public static function addToChat($request,$context){
        $user = context::getSessionAttribute("utilisateur");
        $userParam = utilisateurTable::getUserById($user->id);
        $text = $_POST["chat"];
        if ($userParam != NULL && strlen($text) != 0) {
            chatTable::addChat($text, $userParam);
        }
        else {
            $context->notify = "erreur lors de l'envoie";
        }
        $context->redirect("Click.php?action=index");
    }
    public static function mur($request,$context){
        $context->messages = messageTable::getMessages();
        return context::SUCCESS;
    }
    public static function statut($request,$context){
        $context->user = context::getSessionAttribute("utilisateur");
        return context::SUCCESS;
    }
    public function  ecrire_message($request,$context)
    {
        return context::SUCCESS;
    }
    public static function index($request,$context){
        $context->user = context::getSessionAttribute("utilisateur");
    	if(context::getSessionAttribute("utilisateur") === NULL) {
    		$context->redirect("Click.php?action=login"); 	
    	}
    	$context->template = array();        
    	$context->template[] = "listeUsers";
        $context->template[] = "mur";
        $context->template[] = "chat";
    	$context->template[] = "profil";
    	$context->template[] = "statut";
        $context->template[] = "ecrire_message";
        return context::SUCCESS;
    }

}
