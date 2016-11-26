<div class="row">
<div id="contain">
  <div class="alert alert-success col-xs-8">
    <?php echo  "Bonjour  ".$context->getSessionAttribute("utilisateur")->identifiant; ?>
  </div>
  <div class="col-xs-4">
    <a id="logout" href="Click.php?action=logout" class="btn btn-danger"> deconnexion </a>
  </div>

  <script>
  $("#logout").click(function(e)
  {
  e.preventDefault();

  $.ajax({

         url : 'ClickJS.php?action=logout',

         type : 'GET',

         dataType : 'html',

         success : function(code_html, statut){

  	$("#notify").html("Vous etes bien deconnecte");
             $("#contain").html(code_html);

         },


         error : function(resultat, statut, erreur){

           

         },


         complete : function(resultat, statut){


         }


      });
  });
  </script>

</div>
</div>
