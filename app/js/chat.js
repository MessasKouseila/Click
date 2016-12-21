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
            containment: "#contenuALL",
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
        info = $( ".direct-chat-messages#chatsMessage > .direct-chat-msg:last-child" );
        id = info.attr("id");
        $("#containerChat").draggable("option", "disabled", true);
        $("#agrandire").click(
            function () {
                $("#headChat").toggleClass("hideON");
                $("#containerChat").toggleClass("hiddenMessage");
                $("#bodyChat").toggleClass("hidden");
                $("#footerChat").toggleClass("hidden");

                var c = $("#containerChat").hasClass("hiddenMessage");
                if (c) {
                    $("#agrandire").toggleClass("glyphicon-minus");
                    $("#agrandire").toggleClass("glyphicon-modal-window");
                } else {
                    $("#agrandire").toggleClass("glyphicon-modal-window");
                    $("#agrandire").toggleClass("glyphicon-minus");
                }
                return false;
            }
        );
        $("#chatsMessage").scrollTop(1E10 * 50);
        setInterval(updateChat, 8000);
    });
    $( "#actualiser" ).on( "click", function(e) {
        $( "#actualiser" ).css( "color", "#2ef31bo" );
        window.setTimeout( function() {
            $( "#actualiser" ).css( "color", "#000c77" );
        }, 1000 );
    });
    $("#actualiser").click(function (e) {
        updateChat();
    });
    // fonction send avec ajax
    $("#sendChat").submit(function (e) {
        var message = $("#btn-input").val();
        if(message.length != 0) {
            $.ajax({
                url: 'ClickJS.php?action=addToChat',
                type: 'POST',
                data: 'chat='+message,
                dataType: 'html',
                success: function (code_html, statut) {
                    $( "#headChat" ).css( "color", "#16A600" );
                    window.setTimeout( function() {
                        $( "#headChat" ).css( "color", "#1b6d85" );
                    }, 1000 );
                },
                error: function (resultat, statut, erreur) {
                    $( "#headChat" ).css( "color", "#851C00" );
                    window.setTimeout( function() {
                        $( "#headChat" ).css( "color", "#1b6d85" );
                    }, 1000 );
                },
                complete: function (resultat, statut) {
                }
            });
            updateChat();
            $("#btn-input").val("");
        }
        $("#chatsMessage").scrollTop(1E10 * 50);
        return false;
    });
});
function updateChat() {
    $.ajax({
        url: 'ClickJS.php?action=actuChat',
        type: 'POST',
        data: 'id='+ id,
        dataType: 'html',

        success: function (code_html, statut) {
            $("#chatsMessage").append(code_html);
        },
        error: function (resultat, statut, erreur) {
        },
        complete: function (resultat, statut) {
            info = $( ".direct-chat-messages#chatsMessage > .direct-chat-msg:last-child" );
            id = info.attr("id");
        }
    });
}
