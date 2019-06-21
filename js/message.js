/**
 * Created by pc on 20/12/2016.
 */

function updateMessage() {
    $.ajax({
        url: 'ClickJS.php?action=mur',
        type: 'POST',
        data: ($("#mur div").first().attr("id") != undefined)?'id=' + $("#mur div").first().attr("id")+"&user="+$("body").attr("id"): "user="+$("body").attr("id"),
        dataType: 'html',

        success: function (code_html, statut) {
            if(code_html != "") {

                $("#nouveauxMessages").removeClass("hide");
                $("#mur div").first().before(code_html);
            }
        },
        error: function (resultat, statut, erreur) {
        },
        complete: function (resultat, statut) {

        }
    });
}

$(document).ready(function () {
    setInterval(updateMessage, 8000);
});
$("#nouveauxMessages").click(function () {
        $(this).addClass("hide");
        $(window).scrollTop(0);
    }

);
$('#mur').on('click', '.aime', function() {
        $(this).addClass('disabled');
        var elem = $(this);
        var id = $(this).parent().parent().parent().parent().attr("id");
        $.ajax({
            url: 'ClickJS.php?action=aimerMessage',
            type: 'POST',
            data: 'id=' + id ,
            dataType: 'html',

            success: function (code_html, statut) {
                elem.removeClass('disabled');
                elem.children(".nbaime").text(parseInt(elem.children(".nbaime").text())+1);
            },
            error: function (resultat, statut, erreur) {
                elem.removeClass('disabled');
            },
            complete: function (resultat, statut) {

            }
        });

    }
);

$('#mur').on('click', '.partager', function() {
        $(this).addClass('disabled');
        var elem = $(this);
        var id = $(this).parent().parent().parent().parent().attr("id");
        $.ajax({
            url: 'ClickJS.php?action=partagerMessage',
            type: 'POST',
            data: 'id=' + id ,
            dataType: 'html',

            success: function (code_html, statut) {
                elem.removeClass('disabled');
            },
            error: function (resultat, statut, erreur) {
                elem.removeClass('disabled');
            },
            complete: function (resultat, statut) {

            }
        });
        $(this).children(".nbaime").text(parseInt($(this).children(".nbaime").text())+1);
    }
);