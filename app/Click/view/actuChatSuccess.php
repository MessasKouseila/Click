<?php
/**
* Created by PhpStorm.
* User: kouceila
* Date: 13/12/16
* Time: 06:44
*/
foreach ($context->allChats as $chat): ?>
    <li id="<?php echo $chat->id; ?>" class="left clearfix list-group-item nopadding">
        <span class="chat-img pull-left">
            <img
                src="<?php echo ($chat->emetteur->avatar === NULL) ? "image/default.jpeg" : $chat->emetteur->avatar; ?>"
                alt="User Avatar" class="img-circle" width="35" height="35"/>
        </span>
        <div class="chat-body clearfix nopadding">
            <div class="header">
                <strong
                    class="primary-font"><?php echo ($chat->emetteur != NULL) ? $chat->emetteur->nom : "nom"; ?>
                </strong>
                <small class="pull-right text-muted">
                    <span class="glyphicon glyphicon-time"></span>
                    <?php echo $chat->post->date->format('Y-m-d H:i:s'); ?>
                </small>
            </div>
            <p>
                <?php
                    echo htmlspecialchars($chat->post->texte);
                    $id = $chat->id;
                ?>
            </p>
        </div>
    </li>
<?php endforeach; ?>