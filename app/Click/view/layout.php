<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link href="css/login.css" rel="stylesheet"/>
	<title>Ton appli !</title>
   
</head>
<body>
<div class="container-fluid">
<script src="js/jquery.js"></script>
<div id="notify">
<?php $var = $context->notify; ?>
<?php if(isset($var)) : ?>
	<h2><?php echo $context->notify; ?></h2>
<?php endif;?>	
</div>
<!-- j'ai le droit de mettre des commentaires dans mon fichier HTML -->
	<?php include($template_view); ?>
</div>    
</body>
</html>
