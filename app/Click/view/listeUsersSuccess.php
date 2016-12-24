<button class="ui-state-default ui-corner-all fixed-bottom  btn btn-lg btn-info btn-circle  active center"
        id="animation" data-toggle="tooltip" title="Liste des utilisateurs">
    <i class="glyphicon glyphicon-list"></i>
</button>
<div class="panel panel-primary fixed-bottom nopadding toggler" id="effect" style="display : none;">
    <div class="panel-heading">
		<span class="btn btn-xs  pull-left" id="buttonreduire">
            <span class="glyphicon glyphicon-minus"></span>
		</span>
        <h3 class="panel-title">Liste Utilisateur</h3>
    </div>
    <div id="bodyuser" class="panel-body nopadding">
        <ul class="list-group nopadding">
            <?php foreach ($context->users as $user) : ?>
                <a href="<?php echo "Click.php?action=index&user=" . $user->id ?>" data-toggle="tooltip"
                   title="<?php echo $user->statut; ?>">
                    <li class="list-group-item nopadding" id="userItem">
                        <div id="<?php echo $user->id; ?>" class="hidden"></div>
                        <img src="<?php echo ($user->avatar === NULL) ? 'image/default.jpeg' : $user->avatar; ?>"
                             class="img-circle" height="35" width="35" alt="Avatar">
                        <br><?php echo "" . $user->nom . "<br>" . $user->prenom; ?>
                    </li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>
</div>