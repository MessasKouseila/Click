<div class="panel panel-primary fixed-bottom">
	<div class="panel-heading">
		<h3 class="panel-title">Liste Utilisateur</h3>
	</div>
	<div class="panel-body">
		<ul class="list-group">
			<?php
			foreach ($context->users as $user) :
				?>
			<li class="list-group-item">
				<img src="<?php echo ($user->avatar === NULL)?"image/default.jpeg":$user->avatar ;?>" class="img-circle" height="55" width="55" alt="Avatar">
					<br><?php echo "". $user->nom ."<br>" . $user->prenom ; ?>
				</li>

			<?php endforeach; ?>
		</ul>
	</div>
</div>
