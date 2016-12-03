<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Click</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
  <link href="css/chat.css" rel="stylesheet"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse" id="menu" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      </ul>
    </div>
  </div>

</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3">
      <div class="well" id="profil">
      <?php include($template_view["profil"]); ?>
      </div>
      <div class="" id="chat">
        <?php include($template_view["chat"]); ?>
      </div>
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <?php include($template_view["statut"]); ?>
      </div>
      </div>
      
      <div id="messages">
      <?php include($template_view["messages"]); ?>
        </div>
    </div>
    <div class="col-sm-2 well" id="listeUsers">
      <?php include($template_view["listeUsers"]); ?>
    </div>
  </div>
</div>
<script src="js/chat.js"></script>
<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
</body>
</html>

