<div class="row text-center">
<?php echo "Affichage du dernier message chat"; ?>
<br>
<?php echo "emeteur : ".$context->lastChat->emetteur->nom; ?>
<br>
<?php echo "contenu : ".$context->lastMessageChat->texte; ?>

<?php foreach ($context->messages as $mes) : ?>
	<blockquote>
		  <p><?php echo $mes->post->texte." ecrit par ".$mes->emetteur->nom." ".$mes->emetteur->prenom." a destination ".$mes->destinataire->nom." ".$mes->destinataire->prenom.(isset($mes->parent)?"(parent ".$mes->parent->nom. " ".$mes->parent->prenom .")":""); ?></p>
	</blockquote>
	<br>
<?php endforeach; ?>
</div>
