<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Click</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <?php include($template_view["menu"]); ?>
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
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true">Status: Feeling Blue</p>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
              </button>     
            </div>
          </div>
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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>

