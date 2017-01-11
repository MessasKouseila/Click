<?php
/*
 * All doc on :
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
        ///Redirection Si l'utilisateur n'est pas connecte
        if(context::getSessionAttribute("utilisateur") === NULL) {
            $context->redirect("Click.php?action=login");
        }
        // On verifie est ce qu'on veut consulter un profil
        if(empty($request["user"])) {
            $context->isuser = true;
            $context->user = context::getSessionAttribute("utilisateur");
        }
        // SInon
        else {
            $context->usercur = context::getSessionAttribute("utilisateur");
            $context->isuser = ($context->usercur->id == $request["user"]);
            $context->user =  utilisateurTable::getUserById($request["user"]);
        }
        return context::SUCCESS;
    }
    public static function menu($request,$context){
        return context::SUCCESS;
    }
    public static function  chat($request,$context){
        $context->allChats = chatTable::getChats();
        return context::SUCCESS;
    }
    public static function actuChat($request,$context){
        $limit = strval($_POST["id"]);
        $context->allChats = chatTable::getChatsAfterId($limit);
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
    }
    public static function mur($request,$context){
        $user = (isset($request["user"])) ?strval($request["user"]): context::getSessionAttribute("utilisateur")->id;
        if(!isset($request['id']) )
            $context->messages = messageTable::getUserMessageById($user);
        else
            $context->messages = messageTable::getMessagesAfterId(strval($request['id']),$user);
        return context::SUCCESS;
    }
    public static function statut($request,$context){
        ///Redirection Si l'utilisateur n'est pas connecte
        if(context::getSessionAttribute("utilisateur") === NULL) {
            $context->redirect("Click.php?action=login");
        }
        // On verifie est ce qu'on veut consulter un profil
        if(empty($request["user"])) {
            $context->isuser = true;
            $context->user = context::getSessionAttribute("utilisateur");
        }
        // SInon
        else {
            $context->usercur = context::getSessionAttribute("utilisateur");
            $context->isuser = ($context->usercur->id == $request["user"]);
            $context->user =  utilisateurTable::getUserById($request["user"]);
        }
        return context::SUCCESS;
    }
    public function  ecrire_message($request,$context)
    {
        if(empty($request["user"]))
            $context->to = NULL;
        else
            $context->to = utilisateurTable::getUserById($request["user"]);
        return context::SUCCESS;
    }
    public static function index($request,$context){
        ///Redirection Si l'utilisateur n'est pas connecte
        if(context::getSessionAttribute("utilisateur") === NULL) {
            $context->redirect("Click.php?action=login");
        }
        // On verifie est ce qu'on veut consulter un profil
        if(empty($request["user"])) {
            $context->isuser = true;
            $context->user = context::getSessionAttribute("utilisateur");
        }
        // SInon
        else {
            $context->usercur = context::getSessionAttribute("utilisateur");
            $context->user =  utilisateurTable::getUserById($request["user"]);
            $context->isuser = ($context->usercur->id == $context->user->id);
        }
        $context->template[] = "listeUsers";
        $context->template[] = "mur";
        $context->template[] = "chat";
        $context->template[] = "profil";
        $context->template[] = "statut";
        $context->template[] = "ecrire_message";
        return context::SUCCESS;
    }
    public static function envoyerMessage($request,$context){
        $emetteur = context::getSessionAttribute("utilisateur");
        ///Redirection Si l'utilisateur n'est pas connecte
        if($emetteur === NULL) {
            $context->redirect("Click.php?action=login");
        }
        $emetteur = utilisateurTable::getUserById($emetteur->id);
        $destinataire = null;
        if(isset($request['id']))
            $destinataire = utilisateurTable::getUserById($request['id']);
        if(isset($emetteur) && isset($destinataire) && isset($request['message']) && isset($_FILES["image"])) {
            $avatar = null;
            if ($_FILES["image"]["size"] == 0) {
                if($request['message'] != "") {
                    messageTable::addMessage($emetteur, $destinataire, $request['message'],"");
                    $context->info = $emetteur->id. " ". $destinataire->id." ".$request['message'];
                    $avatar = 0;
                }
            } else {
                $target_dir = "image/images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $check = @getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        messageTable::addMessage($emetteur,$destinataire,$request['message'],basename($_FILES["image"]["name"]));
                        $avatar = 1;
                    } else {
                        $context->info = "Erreur lors de l'enregistrement du fichier";
                    }
                } else {
                    $context->info = "Votre fichier n'est pas une image";
                }
            }
            if (isset($avatar))
                $context->info = "Message Envoyé";
            else {
                $context->info = "Erreur envoie";
            }
        }
        else
        {
            $context->info = "Erreur";
        }
        return context::SUCCESS;
    }
    public static function aimerMessage($request,$context){
        ///Redirection Si l'utilisateur n'est pas connecte
        if($context::getSessionAttribute("utilisateur") === NULL) {
            $context->redirect("Click.php?action=login");
        }
        if(isset($request['id']))
            messageTable::aimer(strval($request['id']));
        return context::SUCCESS;
    }
    public static function modificationStatut($request,$context){
        $context->info = false;
        $user = $context::getSessionAttribute("utilisateur");
        ///Redirection Si l'utilisateur n'est pas connecte
        if($user === NULL) {
            $context->redirect("Click.php?action=login");
        }
        if(isset($request['statut']))
            if(utilisateurTable::setStatut(strval($user->id),$request['statut']))
                $user->statut =htmlspecialchars($request['statut']) ;
        return context::SUCCESS;
    }
    public static function partagerMessage($request,$context){
        $user = $context::getSessionAttribute("utilisateur");
        ///Redirection Si l'utilisateur n'est pas connecte
        if($user === NULL) {
            $context->redirect("Click.php?action=login");
        }
        if(isset($request['id']))
            messageTable::partager(strval($request['id']),$user->id);
        return context::SUCCESS;
    }
}