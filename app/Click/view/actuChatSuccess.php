<?php
/**
 * Created by PhpStorm.
 * User: kouceila
 * Date: 13/12/16
 * Time: 06:44
 */
foreach ($context->allChats as $chat): ?>
    <div id="<?php echo $chat->id; ?>" class="direct-chat-msg">
        <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-left">
                <?php echo ($chat->emetteur != NULL) ? $chat->emetteur->nom : "nom"; ?>
                <?php echo ($chat->emetteur != NULL) ? $chat->emetteur->prenom : "prenom"; ?>
            </span>
            <span id="time_chat" class="direct-chat-timestamp pull-right">
                <?php echo ($chat->post !== NULL) ? $chat->post->date->format('d/m/y H:i:s') : "01/01/1899"; ?>
            </span>
        </div>
        <img class="direct-chat-img"
             src="<?php echo ($chat->emetteur->avatar === NULL) ? "image/default.jpeg" : $chat->emetteur->avatar; ?>"
             alt="User Avatar">
        <div class="direct-chat-text text-justify">
            <?php echo ($chat->post !== NULL && strlen($chat->post->texte) != 0) ? htmlspecialchars($chat->post->texte) : "MESSAGE ERREUR";
            $id = $chat->id;
            ?>
        </div>
    </div>
<?php endforeach; ?>