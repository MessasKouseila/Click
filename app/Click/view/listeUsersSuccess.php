<div class="panel panel-primary fixed-bottom definelong nopadding" id="containerListU">
	<div class="panel-heading">
		<h3 class="panel-title">Liste Utilisateur</h3>
	</div>
	<div class="panel-body definelong nopadding" >
		<ul class="list-group">
			<?php
			foreach ($context->users as $user) :
				?>
			<li class="list-group-item nopadding" id="userItem">
				<img src="<?php echo ($user->avatar === NULL)?"image/default.jpeg":$user->avatar ;?>" class="img-circle" height="35" width="35" alt="Avatar">
					<br><?php echo "". $user->nom ."<br>" . $user->prenom ; ?>
				</li>

			<?php endforeach; ?>
		</ul>
	</div>
</div>
