<div class="row text-center">
<?php
foreach ($context->users as $user) :
	?>
	<blockquote>
		  <p><?php echo "Nom :". $user->nom ." Prenom " . $user->prenom ; ?></p>
	</blockquote>
	<br>

<?php endforeach; ?>
</div>
