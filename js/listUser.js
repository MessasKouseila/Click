
$(function () {
    // run the currently selected effect
    function runEffect() {
        // get effect type from
        var selectedEffect = $("#effectTypes").val();
        // Most effect types need no options passed by default
        var options = {};
        // some effects have required parameters
        if (selectedEffect === "scale") {
            options = {percent: 50};
        } else if (selectedEffect === "size") {
            options = {to: {width: 200, height: 60}};
        }
        // Run the effect
        $("#effect").toggle("blind", options, 500);
    };
    // Set effect from select menu value
    $("#animation").on("click", function () {
        $("#animation").addClass("hide");
        runEffect();
        $("#listeUser").css("height", "85%");
    });
    $("#buttonreduire").on("click", function () {
        $("#animation").trigger("click");
        $("#animation").removeClass("hide");
        $("#listeUser").css("height", "0%");
    });
    $("li#userItem").popover(
        {
            trigger: "manual",
            container: "body",
            html: true,
            title: "Message",
            content:
            '<div class="alert-success center" id="alertEnvoiMessage2"></div>'+
            '<div class="well" id="formulaire_envoie2">'+
            '<form method="post" action="Click.php?action=envoyerMessage" enctype="multipart/form-data" id="formEnvoiMessage2">'+
            '<div class="input-group">'+
            '<span class="input-group-addon btn btn-primary" id="imageMessage2">'+
            '<span class="glyphicon glyphicon-picture"></span>'+
            '</span>'+
            '<textarea class="form-control" rows="3" placeholder="Ecrivez votre message" name="message"></textarea>'+
            '</div>'+
            '<p></p>'+
            '<div class="row">'+
            '<input type="submit" class="btn btn-info pull-right" id="envoyerMessage2" value="Envoyer">'+
            '<div class=" pull-left" id="image2"></div>'+
            '</div>'+
            '<input type="file" class="hide" id="fichierMessage2" name="image" accept="image/*">'+
            '<input type="text" class="hide" value="11" name="id" id="userID">'+
            '</form>'+
            '</div>'
            ,
            placement: "left"
        }
    ).on("mouseenter", function () {
        var _this = this;
        var timeID2 = null;
        timeID = setTimeout(function () {
            var inf = $(_this).children(".hidden");
            inf2 = $(inf).attr("id");
            $(_this).popover("show");
            $(".popover").on("mouseenter", function () {
                clearTimeout(timeID2);
                timeID2 = null;
                delete timeID2;
            });
            $(".popover").on("mouseleave", function () {
                timeID2 = setTimeout(function () {
                    $(_this).popover('hide');
                    inf2 = -1;
                }, 1500);
            });
            $("#imageMessage2").on("click", function () {
                $("#fichierMessage2").trigger("click");
            });

            $("input[type=file]").on("change", function(event) {
                //alert(URL.createObjectURL(event.target.files[0]));
                $("#imageMessage2").addClass("active");
                $("#image2").html("<img src='" +URL.createObjectURL(event.target.files[0]) +"' class='img-responsive' height='40' width='40' style='display: inline;' > " +
                    " <span class='btn  btn-xs btn-danger active' id='removeImage2'>"+
                    " <span class='glyphicon glyphicon glyphicon-remove-circle'></span>"+
                    "</span>" +
                    ""+
                    "");
            });

            $('#image2').on('click', '#removeImage2', function() {
                $("#imageMessage2").removeClass("active");
                $("#fichierMessage2").val("");
                $("#image2").html("");
            });

            $("#envoyerMessage2").on("click", function(e)
            {
                e.preventDefault();
                var valeur = $("#userID");
                $(valeur).val(inf2);
                var val = (window.FormData) ? new FormData($("#formEnvoiMessage2")[0]) : $("#formEnvoiMessage2").serialize();
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
                            $("#alertEnvoiMessage2").attr("class","alert-success center");
                            $("#alertEnvoiMessage2").html(code_html);
                        }
                        else {
                            $("#alertEnvoiMessage2").attr("class","alert-danger center");
                            $("#alertEnvoiMessage2").html(code_html);
                        }
                    },
                    error : function(resultat, statut, erreur){
                    },
                    complete : function(resultat, statut){
                    }
                });
            });
        }, 2000);
    }).on("mouseleave", function () {
        clearTimeout(timeID);
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide");
                inf2 = -1;
            }
        }, 150);
    });
});