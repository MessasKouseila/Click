<html><head>
  <title>Click -</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head><body>
<nav class="navbar navbar-inverse" id="menu">
  <div class="container-fluid" >
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
        <li class="active">
          <a href="#">Home</a>
        </li>
        <li>
          <a href="#">Messages</a>
        </li>
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
        <li>
          <a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid text-center" id="mainWindow">
  <div class="col-sm-3">
    <div class="well" id="profil">
      <?php include($template_view["profil"]); ?>
    </div>
    <div class="row" id="chat">
      <?php include($template_view["chat"]); ?>
      <script src="js/chat.js"></script>
    </div>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-12" id="statut">
          <?php include($template_view["statut"]); ?>
        </div>
      </div>
      <?php include($template_view["mur"]); ?>



    </div>
    <div class="col-sm-2" id="listeUser">
      <?php include($template_view["listeUsers"]); ?>
    </div>
  </div>
  <footer class="section section-primary">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 contenteditable="true">Footer header</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
            <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            <br>Ut enim ad minim veniam, quis nostrud</p>
        </div>
      </div>
    </div>
  </footer>
</body></html>