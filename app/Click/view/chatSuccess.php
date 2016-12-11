<div class="panel panel-primary roundTopLeft roundTopRight nopadding" id="containerChat">
    <!-- menu du chat-->
    <div class="panel-heading nopadding" id="headChat">
        <span class="pull-left" id="boutondrag">
        <input id="chatdrag" class="pull-left" checked data-toggle="toggle" type="checkbox">
            </span>
        <span class="glyphicon glyphicon-comment"></span>  Chat
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-chevron-down"></span>
            </button>
            <ul class="dropdown-menu slidedown">
                <li><a href="#"><span class="glyphicon glyphicon-refresh"></span>actualiser</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-ok-sign"></span>disponible</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-remove"></span>occuper</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-time"></span>deconnecte</a></li>
            </ul>
        </div>
    </div>
    <!-- messages dans le chat-->
    <div class="panel-body nopadding" id="bodyChat">
        <ul class="chat list-group">
            <?php foreach ($context->allChats as $chat): ?>
            <li class="left clearfix list-group-item nopadding"><span class="chat-img pull-left">
                <img src="<?php echo ($chat->emetteur->avatar === NULL)?"image/default.jpeg":$chat->emetteur->avatar ;?>" alt="User Avatar" class="img-circle" width="35" height="35"/>
            </span>
                <div class="chat-body clearfix nopadding">
                    <div class="header">
                        <strong class="primary-font"><?php echo($chat->emetteur != NULL) ? $chat->emetteur->nom : "nom"; ?></strong>
                        <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time"></span><?php echo $chat->post->date->format('Y-m-d H:i:s'); ?>
                        </small>
                    </div>
                    <p>
                        <?php echo $chat->post->texte; ?>
                    </p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- footer du chat-->
    <div class="panel-footer" id="footerChat">
        <form class="nopadding" method="post" action="Click.php?action=addToChat">
            <div class="input-group">
                <input id="btn-input" type="text" name="chat" class="form-control input-sm" placeholder="exprime toi"/>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">Send</button>
                </span>
            </div>
        </form>
    </div>
</div>














