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
            </span >
            <span id="time_chat" class="direct-chat-timestamp pull-right">
                <?php echo $chat->post->date->format('y/m/d H:i:s'); ?>
            </span>
        </div>
        <!-- /.direct-chat-info -->
        <img class="direct-chat-img"
             src="<?php echo ($chat->emetteur->avatar === NULL) ? "image/default.jpeg" : $chat->emetteur->avatar; ?>"
             alt="User Avatar">
        <div class="direct-chat-text text-justify">
            <?php
                echo htmlspecialchars($chat->post->texte);
                $id = $chat->id;
            ?>
        </div>
        <!-- /.direct-chat-text -->
    </div>
<?php endforeach; ?>