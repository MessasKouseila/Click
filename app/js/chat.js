/**
 * Created by kouceila on 03/12/16.
 */
//resizeAndDrag
$(function () {
    $("#containerChat").draggable(
        {
            containment: "parent"
        }
    ).resizable(
        {
            containment: "parent",
            handles: "s, n, w, e",
            maxHeight: 600,
            maxWidth: 960,
            minWidth: 225,
            minHeight: 265
        }
    );
    $("#chatdrag").change(function () {
        if ($("#containerChat").draggable("option", "disabled") == true) {
            $("#containerChat").draggable("option", "disabled", false);
        } else {
            $("#containerChat").draggable("option", "disabled", true);
        }
    });
    $(document).ready(function () {
        var taille_head = $("#headChat").width();
        $("#btn-chat").on("mouseover", function () {
            $("#btn-chat").css("color", "black");
        });
        $("#btn-chat").on("mouseleave", function () {
            $("#btn-chat").css("color", "white");
        });
        $("#newMessages").html("");
        info = $( ".direct-chat-messages#chatsMessage > .direct-chat-msg:last-child" );
        id = info.attr("id");
        $("#containerChat").draggable("option", "disabled", true);
        $("#agrandire").on("click", 
            function () {
                $("#headChat").toggleClass("hideON");
                $("#containerChat").toggleClass("hiddenMessage");
                $("#bodyChat").toggleClass("hidden");
                $("#footerChat").toggleClass("hidden");

                var controle1 = $("#containerChat").hasClass("hiddenMessage");
                if (controle1) {
                    $("#agrandire").toggleClass("glyphicon-minus");
                    $("#agrandire").toggleClass("glyphicon-modal-window");

                } else {
                    $("#agrandire").toggleClass("glyphicon-modal-window");
                    $("#agrandire").toggleClass("glyphicon-minus");
                    $("#containerChat").css("top","auto");
                    updateChat();
                }
                return false;
            }
        );
        $("#fermer_chat").click(
            function () {
                var controle1 = $("#containerChat").hasClass("hiddenMessage");
                if(!controle1) {
                    $("#agrandire").trigger("click");
                }
                $("#containerChat").css("left","0px");
                $("#containerChat").css("top","95%");
            }
        );
        $("#chatsMessage").scrollTop(1E10 * 50);
        setInterval(updateChat, 8000);
    });
    $( "#actualiser" ).on( "click", function(e) {
        $( "#actualiser" ).css( "color", "#2ef31bo" );
        window.setTimeout( function() {
            $( "#actualiser" ).css( "color", "#000000" );
        }, 1000 );
    });
    $("#actualiser").click(function (e) {
        var charger = $("#newMessages").html();
        $("#chatsMessage").append(charger);
        $("#newMessages").html("");
        $("#nbr_chat").removeClass("flash");
        $("#nbr_chat").css( "background-color", "white" );


    });
    // envoie le message sur la bdd via ajax
    $("#sendChat").submit(function (e) {
        var message = $("#btn-input").val();
        if(message.length != 0) {
            $.ajax({
                url: 'ClickJS.php?action=addToChat',
                type: 'POST',
                data: 'chat='+message,
                dataType: 'html',
                success: function (code_html, statut) {
                    $( "#headChat" ).css( "background-color", "#16A600" );
                    window.setTimeout( function() {
                        $( "#headChat" ).css( "background-color", "rgb(64, 128, 255)" );
                    }, 1500 );
                },
                error: function (resultat, statut, erreur) {
                    $( "#headChat" ).css( "background-color", "#851C00" );
                    window.setTimeout( function() {
                        $( "#headChat" ).css( "background-color", "#1b6d85" );
                    }, 1500 );
                },
                complete: function (resultat, statut) {
                }
            });
            updateChat();
            $("#btn-input").val("");
        }
        $("#chatsMessage").scrollTop(1E10 * 80);
        return false;
    });
});
// fonction ajax qui recupere tous les messages qui n'ont pas été afficher encore sur le chat
// elle recupere l'id du dernier chat afficher, puis effectue une requete avec cette id
function updateChat() {
    $.ajax({
        url: 'ClickJS.php?action=actuChat',
        type: 'POST',
        data: 'id='+ id,
        dataType: 'html',

        success: function (code_html, statut) {
            // je recupere les nouveau message puis je calcule le nombre de nouveau message
            $("#newMessages").html(code_html);
            var controle = $("#containerChat").hasClass("hiddenMessage");
            var lastmessge = $(".hidden#newMessages > .direct-chat-msg:last-child");
            id2 = lastmessge.attr("id");
            if(id2 == null) {
                diff1 = parseInt(id);
                diff2 = parseInt(id);
            } else {
                diff1 = parseInt(id2);
                diff2 = parseInt(id);
            }
            if (!controle) {
                if ((diff1 - diff2) != 0) {
                    $( "#headChat" ).css( "background-color", "#F3DA51" );
                    window.setTimeout( function() {
                        $( "#headChat" ).css( "background-color", "rgb(64, 128, 255)" );
                    }, 300 );
                }
                $("#actualiser").trigger("click");
            }
            lastmessge = $(".hidden#newMessages > .direct-chat-msg:last-child");
            id2 = lastmessge.attr("id");
            if(id2 == null) {
                diff1 = parseInt(id);
                diff2 = parseInt(id);
            } else {
                diff1 = parseInt(id2);
                diff2 = parseInt(id);
            }
            $("#nbr_chat").text(diff1 - diff2);
            if ((diff1 - diff2) != 0) {
                $("#nbr_chat").effect("bounce", "slow");
                $("#nbr_chat").addClass("flash");
                $("#nbr_chat").css( "background-color", "#F5FB92" );
            }
            $("#chatsMessage").scrollTop(1E10 * 80);
        },
        error: function (resultat, statut, erreur) {
        },
        complete: function (resultat, statut) {
            // j'actualise mon dernier id
            info = $( ".direct-chat-messages#chatsMessage > .direct-chat-msg:last-child" );
            id = info.attr("id");
        }
    });
}
