<!-- container general du chat-->
<div id="containerChat" class="box box-primary direct-chat direct-chat-primary nopadding">
    <!-- menu du chat-->
    <div id="headChat" class="box-header with-border">
        <h3 id="title_chat" class="box-title">Chat</h3>
        <span id="nbr_chat" data-toggle="tooltip" title="" class="badge bg-light-blue"> 0 </span>
        <span class="pull-left" id="boutondrag">
            <label class="switch">
              <input id="chatdrag" type="checkbox">
              <div class="slider round"></div>
            </label>
        </span>
        <div class="box-tools pull-right" id="option_chat">
            <span id="agrandire" class=" pull-right glyphicon glyphicon-minus"></span>
            <span id="actualiser" class="glyphicon glyphicon-refresh pull-right"></span>
        </div>
    </div>
    <div id="newMessages" class="hidden"></div>
    <!-- body du chat avec les messages chat afficher-->
    <div id="bodyChat" class="box-body nopadding2">
        <div id="chatsMessage" class="direct-chat-messages">
            <?php foreach ($context->allChats as $chat): ?>
                <div id="<?php echo $chat->id; ?>" class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">
                            <?php echo ($chat->emetteur != NULL) ? $chat->emetteur->nom : "nom"; ?>
                        </span >
                        <span id="time_chat" class="direct-chat-timestamp pull-right">
                            <?php echo $chat->post->date->format('y/m/d H:i:s'); ?>
                        </span>
                    </div>
                    <img class="direct-chat-img"
                         src="<?php echo ($chat->emetteur->avatar === NULL) ? "image/default.jpeg" : $chat->emetteur->avatar; ?>"
                         alt="User Avatar">
                    <div class="direct-chat-text text-justify">
                        <?php
                            echo htmlspecialchars($chat->post->texte);
                            $id = $chat->id;
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- footer du chat avec formulaire d'envoie-->
    <div id="footerChat" class="box-footer">
        <form id="sendChat" class=" form-inline nopadding">
            <div id="text_chat" class="input-group">
                <input id="btn-input" type="text" name="chat" placeholder="Exprime toi ici" class="form-control">
                <span class="input-group-btn">
                    <button id="btn-chat" type="submit" class="btn btn-primary btn-flat">Send</button>
                </span>
            </div>
        </form>
    </div>
</div>