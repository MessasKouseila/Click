<div id="containerChat" class="box box-primary direct-chat direct-chat-primary nopadding">
    <div id="headChat" class="box-header with-border">
        <h3 id="title_chat" class="box-title">Chat</h3>
        <span id="nbr_chat" data-toggle="tooltip"
              title=""
              class="badge bg-light-blue"
              data-original-title="3 New Messages">3
        </span>
        <span class="pull-left" id="boutondrag">
            <label class="switch">
              <input id="chatdrag" type="checkbox">
              <div class="slider round"></div>
            </label>
        </span>
        <div class="box-tools pull-right">
            <span id="agrandire" class=" pull-right glyphicon glyphicon-minus"></span>
            <span id="actualiser" class="glyphicon glyphicon-refresh pull-right"></span>
        </div>
    </div>
    <!-- /.box-header -->
    <div id="bodyChat" class="box-body nopadding2">
        <!-- Conversations are loaded here -->
        <div id="chatsMessage" class="direct-chat-messages">
            <!-- Message. Default to the left -->
            <?php foreach ($context->allChats as $chat): ?>
                <div class="direct-chat-msg">
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
            <!-- /.direct-chat-msg -->

            <!-- Message to the right -->
        </div>
        <!--/.direct-chat-messages-->
    </div>
    <!-- /.box-body -->
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
    <!-- /.box-footer-->
</div>