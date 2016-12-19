<div class="row message" >
    <div class="col-sm-3">
        <div class="well container-fluid">
            <a href="<?php echo "Click.php?action=index&user=".$message->emetteur->id ?>"> <img src="<?php echo ($message->emetteur->avatar === NULL)?"image/default.jpeg":$message->emetteur->avatar ;?>" class="img-circle" height="60" width="60" alt="Avatar">
            <br>
                <?php echo $message->emetteur->nom."<br>".$message->emetteur->prenom ?>
            </a>
        </div>

    </div>
    <div class="col-sm-9">
        <div class="well">
            <?php if($message->parent !== NULL) : ?>
            <div class="row pull-left">
                <a href="<?php echo "Click.php?action=index&user=".$message->parent->id ?>"> <img src="<?php echo ($message->parent->avatar === NULL)?"image/default.jpeg":$message->parent->avatar ;?>" class="img-circle" height="30" width="30" alt="Avatar"> <?php echo $message->emetteur->nom." ".$message->emetteur->prenom ?></a>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo $message->post->image ?>" class="img-responsive">
                </div>
            </div>
            <p><?php echo htmlspecialchars($message->post->texte); ?></p>
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



