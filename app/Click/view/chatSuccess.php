<div class="panel panel-primary">
    <!-- menu du chat-->
    <div class="panel-heading">
        <span class="glyphicon glyphicon-comment"></span>Chat<div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-chevron-down"></span>
            </button>
            <ul class="dropdown-menu slidedown">
                <li><a href="#"><span class="glyphicon glyphicon-refresh"></span>Refresh</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-ok-sign"></span>Available</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-remove"></span>Busy</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-time"></span>Away</a></li>
                <li class="divider"></li>
                <li><a href="#"><span class="glyphicon glyphicon-off"></span>Sign Out</a></li>
            </ul>
        </div>
    </div>
    <!-- messages dans le chat-->
    <div class="row">
    <div class="panel-body">
        <ul class="chat">
            <?php foreach ($context->allChats as $chat): ?>
            <div class="col-md-3 col-sm-3">
                <li class="left clearfix"><span class="chat-img pull-left">
                    <img src="<?php echo $chat->emetteur->avatar; ?>" alt="User Avatar" class="img-circle"/>
                </span>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font"><?php echo $chat->emetteur->nom; ?></strong>
                        <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time"></span><?php echo $chat->post->date->format('i'); ?>
                        </small>
                    </div>
                    <p>
                        <?php echo $chat->post->texte; ?>
                    </p>
                </div>
            </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    </div>
    <!-- footer du chat-->
    <div class="panel-footer">
        <div class="input-group">
            <input id="btn-input" type="text" class="form-control input-sm"
                   placeholder="Type your message here..."/>
            <span class="input-group-btn">
                <button class="btn btn-warning btn-sm" id="btn-chat">Send</button>
            </span>
        </div>
    </div>
</div>
