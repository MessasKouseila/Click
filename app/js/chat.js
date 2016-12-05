/**
 * Created by kouceila on 03/12/16.
 */
//resizeAndDrag
$(function() {
    $( "#chat" ).draggable({ containment: "mainWindow" });
    $( "#chat" ).resizable();
});
