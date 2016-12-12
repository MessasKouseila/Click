/**
 * Created by kouceila on 03/12/16.
 */
//resizeAndDrag
$(function () {
    $("#containerChat").draggable(
        {
            containment: "#contenuALL"
        }
            ).resizable(
        {
            containment: "#contenuALL",
            handles: "s, n, w, e",
            maxHeight: 650,
            maxWidth: 600,
            minHeight: 310,
            minWidth: 310

        }
    );
    $("#chatdrag").change(function () {
        if ($("#containerChat").draggable("option", "disabled") == true) {
            $("#containerChat").draggable("option", "disabled", false);
        } else {
            $("#containerChat").draggable("option", "disabled", true);
        }
    });
    $(document).ready(function() {
        var val = $("#containerChat").height();
        $("#containerChat").toggleClass("hiddenMessage");
        $("#agrandire").html('<span class=" pull-right glyphicon glyphicon-minus"></span>');
        $("#agrandire").click(
            function() {
                var c = $("#containerChat").hasClass("hiddenMessage");
                if (c){
                    $("#agrandire").html('<span class=" pull-right glyphicon glyphicon-minus"></span>');
                } else {
                    $(this).html('<span class="pull-right glyphicon glyphicon-modal-window"></span>');
                }
                $("#containerChat").toggleClass("hiddenMessage");
                return false;
            });
    });

});


