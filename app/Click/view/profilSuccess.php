<p>
    <a href="#"><?php echo $context->user->nom." ".$context->user->prenom;?></a>
</p>
<img src="<?php echo ($context->user->avatar === NULL)?"image/default.jpeg":$context->user->avatar ;?>" class="img-circle" height="65" width="65" alt="Avatar">
<p>Né(e) Le : <?php echo $context->user->date_de_naissance->format('Y-m-d');?></p>
