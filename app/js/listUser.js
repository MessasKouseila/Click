/**
 * Created by kouceila on 09/12/16.
 */
$(function () {
    $("#containerListU").resizable(
        {
            containment: "#contenuALL",
            handles: "s, n",
            maxHeight: parseInt($("#contenuALL").height(), 10) - 20,
            maxWidth: parseInt($("#listeUser").width(), 10) - 5
        });
});