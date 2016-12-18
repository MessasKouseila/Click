<div id="containerChat" class="panel panel-primary nopadding hidden-xs">
    <!-- menu du chat-->
    <div class="panel-heading nopadding" id="headChat">
        <span class="pull-left" id="boutondrag">
            <label class="switch">
              <input id="chatdrag" type="checkbox">
              <div class="slider round"></div>
            </label>
        </span>
        <span class="glyphicon glyphicon-comment">Chat</span>
        <span id="agrandire" class=" pull-right glyphicon glyphicon-minus"></span>
        <a href="#"><span id="actualiser" class="glyphicon glyphicon-refresh pull-right"></span></a>
    </div>
    <!-- messages dans le chat-->
    <div class="panel-body nopadding" id="bodyChat">
        <ul id="listechat" class="chat list-group">
            <?php foreach ($context->allChats as $chat): ?>
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
        </ul>
    </div>
    <!-- footer du chat-->
    <div class="panel-footer nopadding" id="footerChat">
        <form class="nopadding" id="sendChat">
            <div class="input-group">
                <input id="btn-input" type="text" name="chat" class="form-control input-sm"
                       placeholder="exprime toi"/>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">Send</button>
                </span>
            </div>
        </form>
    </div>
</div>














