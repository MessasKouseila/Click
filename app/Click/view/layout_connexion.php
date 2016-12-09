<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/bootstrap-toggle.css">
    <link rel="stylesheet" href="css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Ton appli !</title>
</head>
<body>
<div class="container-fluid nopadding">
    <nav class="navbar navbar-inverse nopadding">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span id="logo1">C L I C K</span></a>
            </div>
    </nav>
    <div id="notify">
		<?php $var = $context->notify; ?>
		<?php if(isset($var)) : ?>
			<div class="alert alert-danger alert-dismissible text-center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $context->notify; ?>
			</div>
		<?php endif;?>
	</div>
	<!-- j'ai le droit de mettre des commentaires dans mon fichier HTML -->
		<?php include($template_view["login"]); ?>
        <script src="js/logo.js"></script>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap-toggle.min.js"></script>
</body>
</html>
