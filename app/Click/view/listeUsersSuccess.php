<button  class="ui-state-default ui-corner-all fixed-bottom  btn btn-lg btn-info btn-circle hide active center" id="animation" data-toggle="tooltip" title="Liste des utilisateurs" style="z-index:10000000 !important;"><i class="glyphicon glyphicon-list"></i></button>



<div class="panel panel-primary fixed-bottom definelong nopadding toggler" id="effect" >
	<div class="panel-heading" >
		<span class="btn btn-xs  pull-left" id="buttonreduire">
                    <span class="glyphicon glyphicon-minus"></span>
		</span>
		<h3 class="panel-title">Liste Utilisateur</h3>
	</div>
	<div class="panel-body definelong nopadding" >
		<ul class="list-group">
			<?php
			foreach ($context->users as $user) :
				?>
                <a href="<?php echo "Click.php?action=index&user=".$user->id ?>" data-toggle="tooltip" title="<?php echo  $user->statut;?>">
                <li class="list-group-item nopadding" id="userItem">
				<img src="<?php echo ($user->avatar === NULL)?'image/default.jpeg':$user->avatar ;?>" class="img-circle" height="35" width="35" alt="Avatar">
					<br><?php echo "". $user->nom ."<br>" . $user->prenom ; ?>
				</li>
                </a>


			<?php endforeach; ?>
		</ul>
	</div>
</div>


<script>
	$( function() {
		// run the currently selected effect
		function runEffect() {
			// get effect type from
			var selectedEffect = $( "#effectTypes" ).val();
			// Most effect types need no options passed by default
			var options = {};
			// some effects have required parameters
			if ( selectedEffect === "scale" ) {
				options = { percent: 50 };
			} else if ( selectedEffect === "size" ) {
				options = { to: { width: 200, height: 60 } };
			}
			// Run the effect
			$( "#effect" ).toggle( "blind", options, 500 );
		};
		// Set effect from select menu value
		$( "#animation" ).on( "click", function() {
			$( "#animation" ).addClass("hide");
			runEffect();
		});
		$( "#buttonreduire" ).on( "click", function() {
			$( "#animation" ).trigger("click");
			$( "#animation" ).removeClass("hide");
		});
	} );
$( "#buttonreduire" ).trigger("click");
</script>
