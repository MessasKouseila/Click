/**
 * Created by kouceila on 03/12/16.
 */
//resizeAndDrag
$(function () {
    $("#chat").draggable({containment: "#contenuALL"});
    $("#chat").resizable({containment: "#contenuALL"});

    $("#chatdrag").change(function () {
        if ($("#chat").draggable("option", "disabled") == true) {
            $("#chat").draggable("option", "disabled", false);
        } else {
            $("#chat").draggable("option", "disabled", true);
        }
    });
});
