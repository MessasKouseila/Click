<div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p> </p>
           <img src="<?php echo $context->message->avatar; ?>" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p><?php echo $context->message->post->texte; ?></p>
          </div>
        </div>
</div>

<div class="row" id="chat">
    <div class="col-sm-3">
        <div class="well">
            <p>Ecrit par:</p>
            <p><?php echo $context->message->emetteur->nom ." ". $context->message->emetteur->prenom; ?></p>
            <img src="<?php echo $context->message->emetteur->avatar?>" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
        <div class="well">
            <p>Destinataire:</p>
            <p><?php echo $context->message->destinataire->nom ." ". $context->message->destinataire->prenom; ?></p>
            <img src="<?php echo $context->message->destinataire->avatar ?>" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
        <div class="well">
            <p>Partager par:</p>
            <p><?php echo $context->message->parent->nom ." ". $context->message->parent->prenom; ?></p>
            <img src="<?php echo $context->message->parent->avatar; ?>" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
    </div>
    <div class="col-sm-9">
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    <a href="#"><img src="<?php echo $context->message->post->image ?>" class="img-responsive"></a>
                </div>
            </div>
            <p><?php echo $context->message->post->texte; ?></p>
            <div class="row">
                <button type="button" class="btn btn-primary btn-xs pull-left">
                    <span class="glyphicon glyphicon-thumbs-up"></span>Aimer
                    <span class="badge">42</span>
                </button>
                <p class="pull-right">Publie le : <?php echo $context->message->post->date ?></p>
            </div>
        </div>
    </div>
</div>