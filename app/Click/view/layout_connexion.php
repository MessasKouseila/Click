<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link href="css/login.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <title>Ton appli !</title>
</head>
<body>
<div class="container-fluid nopadding">
	<div id="notify">
	<?php $var = $context->notify; ?>
	<?php if(isset($var)) : ?>
		<div class="alert alert-success">
			<?php echo $context->notify; ?>
		</div>
	<?php endif;?>
	</div>
    <nav class="navbar navbar-inverse nopadding">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span id="logo1">C L I C K</span></a>
            </div>
    </nav>
	<!-- j'ai le droit de mettre des commentaires dans mon fichier HTML -->
		<?php include($template_view); ?>
        <script src="js/logo.js"></script>
</div>
</body>
</html>
