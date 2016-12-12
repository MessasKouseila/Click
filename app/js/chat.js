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
});
