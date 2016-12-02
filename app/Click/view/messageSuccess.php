<div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p> <?php echo $context->message->emetteur->nom ." ". $context->message->emetteur->prenom; ?></p>
           <img src="<?php echo $context->message->avatar; ?>" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p><?php echo $context->message->post->texte; ?></p>
          </div>
        </div>
</div>