<html>
<head>
    <title>Click -</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="css/chat.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/listUser.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="js/jquery.js"></script>
</head>

<body style="height:100% !important;">
<nav class="navbar navbar-default" id="menu">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="" id="logo1">C L I C K</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Messages</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="Rechercher">
                    <span class="input-group-btn">
                <button class="btn btn-default" type="button">  .<span class="glyphicon glyphicon-search"> </span></button>
              </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="Click.php?action=index"><span class="glyphicon glyphicon-user"></span> </a>
                </li>
                <li><a href="Click.php?action=logout"><span class="glyphicon glyphicon-log-out"></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid text-center" id="contenuALL" style="height:100% !important;">
    <div class="col-sm-3">
        <div class="well" id="profil">
            <?php include($template_view["profil"]); ?>
        </div>
        <div class="hidden-xs">
            <?php include($template_view["chat"]); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12" id="statut">
                <?php include($template_view["statut"]); ?>
            </div>
        </div>
        <?php if( $context->givewrite ) : ?>
            <?php include($template_view["ecrire_message"]); ?>
        <?php endif; ?>
        <?php include($template_view["mur"]); ?>

    </div>
    <div class="col-sm-3" id="listeUser">
        <?php include($template_view["listeUsers"]); ?>
    </div>
</div>
<footer class="section section-primary">

</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap-toggle.min.js"></script>
<script src="js/chat.js"></script>
<script src="js/logo.js"></script>
<script src="js/listUser.js"></script>
</body>
</html>
