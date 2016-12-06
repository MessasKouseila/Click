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
        context::setSessionAttribute("utilisateur", NULL);
        $context->notify = "Vous etes bien deconnecte";
        return context::SUCCESS;
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
    public static function mur($request,$context){
        $context->messages = messageTable::getUserMessageById(context::getSessionAttribute("utilisateur")->id);
        return context::SUCCESS;
    }
    public static function statut($request,$context){
        $context->user = context::getSessionAttribute("utilisateur");
        return context::SUCCESS;
    }
    public static function index($request,$context){
$context->template = array();        
$context->template[] = "listeUsers";
        $context->template[] = "mur";
        $context->template[] = "chat";
	$context->template[] = "profil";
	$context->template[] = "statut";
        return context::SUCCESS;
    }

}
