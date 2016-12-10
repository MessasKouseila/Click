<?php
	foreach ($context->messages as $message) :
?>
<div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p> </p>
           <img src="<?php echo $message->avatar; ?>" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p><?php echo $message->post->texte; ?></p>
          </div>
        </div>
</div>

<div class="row" >
    <div class="col-sm-3">
        <div class="well">
            <p>Ecrit par:</p>
            <p><?php echo $message->emetteur->nom ." ". $message->emetteur->prenom; ?></p>
            <img src="<?php echo $context->message->emetteur->avatar?>" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
        <div class="well">
            <p>Destinataire:</p>
            <p><?php echo $message->destinataire->nom ." ". $message->destinataire->prenom; ?></p>
            <img src="<?php echo $context->message->destinataire->avatar ?>" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
        <div class="well">
            <p>Partager par:</p>
            <p><?php echo $message->parent->nom ." ". $message->parent->prenom; ?></p>
            <img src="<?php echo $context->message->parent->avatar; ?>" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
    </div>
    <div class="col-sm-9">
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    <a href="#"><img src="<?php echo $message->post->image ?>" class="img-responsive"></a>
                </div>
            </div>
            <p><?php echo $message->post->texte; ?></p>
            <div class="row">
                <button type="button" class="btn btn-primary btn-xs pull-left">
                    <span class="glyphicon glyphicon-thumbs-up"></span>Aimer
                    <span class="badge">42</span>
                </button>
                <p class="pull-right">Publie le : <?php echo $message->post->date ?></p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
