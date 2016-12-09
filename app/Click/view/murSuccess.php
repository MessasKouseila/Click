<?php
	foreach ($context->messages as $message) :
?>
<div class="row message" >
    <div class="col-sm-3">
        <div class="well">
            <img src="<?php echo $context->message->emetteur->avatar?>" class="img-circle" height="55" width="55" alt="Avatar">
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
                    <span class="badge"><?php echo$message->aime; ?></span>
                </button>
  <button type="button" class="btn  btn-default btn-xs" > Partager </button>
                <p class="pull-right">Publie il y'a: <?php echo date_diff($message->post->date,new DateTime("now"))->format('%a days'); ?></p>
            </div> 
        </div>
    </div>
</div>
<?php endforeach; ?>
