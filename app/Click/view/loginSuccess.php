<div id="contain">
<?php echo  "Bonjour  ".$context->getSessionAttribute("utilisateur")->identifiant; ?>
<br>
<a id="logout" href="Click.php?action=logout"> deconnexion </a>

<script>
$("#logout").click(function(e)
{
e.preventDefault()

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
