$("#imageMessage").click( function () {

        $("#fichierMessage").trigger("click");
    });

$("input[type=file]").change(function (event) {
    //alert(URL.createObjectURL(event.target.files[0]));
    $("#imageMessage").addClass("active");
    $("#image").html("<img src='" +URL.createObjectURL(event.target.files[0]) +"' class='img-responsive' height='40' width='40' style='display: inline;' > " +
        " <span class='btn  btn-xs btn-danger active' id='removeImage'>"+
        " <span class='glyphicon glyphicon glyphicon-remove-circle'></span>"+
        "</span>" +
        ""+
        "");
});


$('#image').on('click', '#removeImage', function() {
    $("#imageMessage").removeClass("active");
    $("#fichierMessage").val("");
    $("#image").html("");
}
);


$("#envoyerMessage").click(function(e)
{
    e.preventDefault();
    var val = (window.FormData) ? new FormData($("#formEnvoiMessage")[0]) : $("#formEnvoiMessage").serialize();
    $.ajax({

        url : 'ClickJS.php?action=envoyerMessage',

        type : 'Post',
        contentType: false,
        processData: false,
        data : val,
        dataType : 'html',

        success : function(code_html, statut){
           if(code_html == "Message Envoyé")
           {
               $("#alertEnvoiMessage").attr("class","alert-success center");
               $("#textareaMessage").val("");
               $("#removeImage").trigger("click");
               $("#alertEnvoiMessage").html(code_html);
           }
           else {
               $("#alertEnvoiMessage").attr("class","alert-danger center");
               $("#alertEnvoiMessage").html(code_html);
           }
            setTimeout(function() {
                $("#alertEnvoiMessage").html("");
            }, 30000);

        },


        error : function(resultat, statut, erreur){



        },


        complete : function(resultat, statut){


        }


    });
});



