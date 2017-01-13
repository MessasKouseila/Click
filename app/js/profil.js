/**
 * Created by Omar on 13/01/2017.
 */
var src = $("#PP").attr("src");
$("#changePP").click(function(e)
{

    $("#imagePP").addClass('disabled');
    $("#PP").attr("src","image/load.gif");
    var val = (window.FormData) ? new FormData($("#formPP")[0]) : $("#formPP").serialize();

    $.ajax({

        url : 'ClickJS.php?action=modificationPP',

        type : 'Post',
        contentType: false,
        processData: false,
        data : val,
        dataType : 'html',

        success : function(code_html, statut){
            if(code_html != "") {
               window.src = code_html;
                $("fichierPP").val("");
            }
            else
                alert("Erreur Changement PP");
            $("#imagePP").html('<img src="' + window.src + '" class="img-circle" height="65" id="PP" width="65" alt="Avatar">')
            $("#imagePP").removeClass('disabled');
        },


        error : function(resultat, statut, erreur){

            $("#imagePP").html('<img src="' + window.src + '" class="img-circle" height="65" id="PP" width="65" alt="Avatar">')
            $("#imagePP").removeClass('disabled');
        },


        complete : function(resultat, statut){


        }


    });
});