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
            maxHeight: 650,
            maxWidth: 600,
            minWidth: 200,
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
        update();
        $("#containerChat").draggable("option", "disabled", true);
        $("#agrandire").click(
            function () {
                $("#containerChat").toggleClass("hiddenMessage");
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
        updateChat();
        $("#bodyChat").scrollTop(1E10 * 10); 
    });
    $( "#actualiser" ).on( "click", function(e) {
        $( "#actualiser" ).css( "color", "red" );
        window.setTimeout( function() {
            $( "#actualiser" ).css( "color", "white" );
        }, 1000 );
    });
    $("#actualiser").click(function (e) {
        update();
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
                    window.setTimeout( function() {
                        alert("message envoyer");
                    }, 1000 );
                },
                error: function (resultat, statut, erreur) {
                    window.setTimeout( function() {
                        alert("message erreur");
                    }, 1000 );
                },
                complete: function (resultat, statut) {
                }
            });
            update();
            $("#btn-input").val("");
        }
        $("#bodyChat").scrollTop(1E10 * 10);
        return false;
    });
});
function update() {
    $.ajax({
        url: 'ClickJS.php?action=actuChat',
        type: 'GET',
        dataType: 'html',

        success: function (code_html, statut) {
            $("#bodyChat").html(code_html);
        },
        error: function (resultat, statut, erreur) {
        },
        complete: function (resultat, statut) {
        }
    });
    $("#bodyChat").scrollTop(1E10 * 10);
}
function updateChat() {
    var id = lastChat();
    $.ajax({

        url: 'ClickJS.php?action=actuChat',
        type: 'GET',
        dataType: 'html',

        success: function (code_html, statut) {
            $("#bodyChat").html(code_html);
        },
        error: function (resultat, statut, erreur) {
        },
        complete: function (resultat, statut) {
        }
    });
    //lastChat();
    setTimeout(updateChat, 10000);
}
function lastChat() {
    var id = $("#lastChat").attr("class");
    return id;
}
