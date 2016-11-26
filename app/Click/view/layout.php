<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link href="css/login.css" rel="stylesheet"/>
	<title>Ton appli !</title>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">

	<div id="notify">
	<?php $var = $context->notify; ?>
	<?php if(isset($var)) : ?>
		<div class="alert alert-success">
			<?php echo $context->notify; ?>
		</div>
	<?php endif;?>
	</div>
	<!-- j'ai le droit de mettre des commentaires dans mon fichier HTML -->
		<?php include($template_view); ?>
	</div>
</body>
</html>
