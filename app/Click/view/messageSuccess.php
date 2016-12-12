<div class="row message" >
    <div class="col-sm-12">
        <div class="well">
            <div>
            <div class="pull-left">
                <a href="<?php echo "Click.php?action=index&user=".$message->emetteur->id ?>"> <img src="<?php echo ($message->emetteur->avatar === NULL)?"image/default.jpeg":$message->emetteur->avatar ;?>" class="img-circle" height="30" width="30" alt="Avatar">
                    <?php echo $message->emetteur->nom." ".$message->emetteur->prenom ?>
                </a>
            </div>
            <?php if($message->parent != $message->emetteur) : ?>
            <div class="pull-right">
                <a href="<?php echo "Click.php?action=index&user=".$message->parent->id ?>"> <img src="<?php echo ($message->parent->avatar === NULL)?"image/default.jpeg":$message->parent->avatar ;?>" class="img-circle" height="30" width="30" alt="Avatar"> <?php echo $message->emetteur->nom." ".$message->emetteur->prenom ?></a>
            </div>
            <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo $message->post->image ?>" class="img-responsive">
                </div>
            </div>
            <p><?php echo $message->post->texte; ?></p>
            <div class="row">
                <button type="button" class="btn btn-primary btn-xs pull-left">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Click
                    <span class="badge"><?php echo$message->aime; ?></span>
                </button>
                <button type="button" class="btn  btn-default btn-xs" > Partager </button>
                <p class="pull-right">Publie il y'a: <?php echo date_diff($message->post->date,new DateTime("now"))->format('%a days'); ?></p>
            </div>
        </div>
    </div>
</div>



