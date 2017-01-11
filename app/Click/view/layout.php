<html>
<head>
    <title>C l i c k</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="image/icon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chat.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/listUser.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body style="height:100% !important;" id="<?php echo $context->user->id; ?>">
<nav class="navbar navbar-default" id="menu">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://pedago.univ-avignon.fr/~uapv1600147/Click/app/Click.php?action=index" id="logo1">C L I C K</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="Click.php?action=index">Accueil</a>
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
<div class="container-fluid text-center" id="contenuALL">
    <div class="hidden-xs" id="limiteChat">
        <?php include($template_view["chat"]); ?>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="well" id="profil">
                <?php include($template_view["profil"]); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="statut">
                <?php include($template_view["statut"]); ?>
            </div>
            <div id="send_Message">
                <?php include($template_view["ecrire_message"]); ?>
            </div>
            <div id="mur">
                <button type="button" style="position: fixed !important;z-index:3 !important;top: 10px !important;left: 50% !important;" class="btn btn-info btn-sm hide " id="nouveauxMessages">Nouveaux Messages</button>
                <?php include($template_view["mur"]); ?>

            </div>
        </div>
        <div class="col-sm-3" id="listeUser">
            <?php include($template_view["listeUsers"]); ?>
        </div>


    </div>
    <footer class="section section-primary">

    </footer>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap-toggle.min.js"></script>
<script src="js/chat.js"></script>
<script src="js/logo.js"></script>
<script src="js/message.js"></script>
<script src="js/listUser.js"></script>
<script src="js/statut.js"></script>
<script src="js/ecrire_message.js"></script>
</body>
</html>