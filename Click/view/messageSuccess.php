<div class="row message" id="<?php echo $message->id ?>">
    <div class="col-sm-12">
        <div class="well">

            <div class="pull-left">
                <a href="<?php echo "Click.php?action=index&user=".$message->emetteur->id ?>"> <img src="<?php echo ($message->emetteur->avatar === NULL)?"image/default.jpeg":$message->emetteur->avatar ;?>" class="img-circle" height="30" width="30" alt="Avatar"><?php echo $message->emetteur->nom." ".$message->emetteur->prenom ?>
                </a>
            </div>
            <?php if($message->parent->id != $message->emetteur->id) : ?>
                <div class="row pull-right">
                    <a href="<?php echo "Click.php?action=index&user=".$message->parent->id ?>"> <img src="<?php echo ($message->parent->avatar === NULL)?"image/default.jpeg":$message->parent->avatar ;?>" class="img-circle" height="30" width="30" alt="Avatar"> <span class="name">
                        <?php echo $message->parent->nom." ".$message->parent->prenom ?></span></a>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12 ">
                    <img src="<?php echo $message->post->image ?>" class="img-responsive center-block">
                </div>
            </div>
            <p><?php echo htmlspecialchars($message->post->texte); ?></p>
            <div class="row">
                <button type="button" class="btn btn-primary btn-xs pull-left aime">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Click
                    <span class="badge nbaime"><?php echo$message->aime; ?></span>
                </button>
                <button type="button" class="btn  btn-default btn-xs partager" > Partager </button>
                <p class="pull-right">Publie il y'a: <?php echo date_diff($message->post->date,new DateTime("now"))->format('%a jours'); ?></p>
            </div>
        </div>
    </div>
</div>