/**
 * Created by pc on 07/01/2017.
 */
var statut = $("#textStatus").html();
$("#modifier").click(
    function () {
        if($("#modifier").text() == "Modifier") {
            $("#modifier").text("Enregistrer");

            $("#textStatus").html("Statut:  <div class=\"form-group input-group\">"
                +"<input type=\"text\" class=\"form-control\" id=\"inputStatut\" placeholder=\"Entrez votre nouveau statut\">"
                +  " <span class=\"input-group-btn\">"
                +   "<button class=\"btn btn-default btn-danger active\" type=\"button\" id=\"buttonStatut\">.<span class=\"glyphicon glyphicon-remove\"> </span></button>"
                +  "</span></div>");
        }
        else
        {

            $("#modifier").addClass('disabled');
            $.ajax({

                url : 'ClickJS.php?action=modificationStatut',
                type : 'Post',
                data : 'statut='+$("#inputStatut").val(),
                dataType : 'html',

                success : function(code_html, statut){


                        window.statut = "Statut: "+ $("#inputStatut").val();
                        $("#alertModificationStatut").attr("class","alert-success center");
                        $("#inputStatut").val("");
                        $('#buttonStatut').trigger("click");
                        $("#alertModificationStatut").html("Enregistrer");
                    $("#modifier").removeClass('disabled');
                    setTimeout(function() {
                        $("#alertModificationStatut").html("");
                    }, 9000);

                },


                error : function(resultat, statut, erreur){
                    $("#alertModificationStatut").attr("class","alert-danger center");
                    $("#alertModificationStatut").html("Erreur");
                    $("#modifier").removeClass('btn-disabled');
                    setTimeout(function() {
                        $("#alertModificationStatut").html("");
                    }, 9000);

                },


                complete : function(resultat, statut){


                }


            });

        }

       });
$('#statutModif').on('click', '#buttonStatut', function() {
    $("#textStatus").html(statut);
    $("#modifier").text("Modifier");
});