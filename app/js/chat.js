/**
 * Created by kouceila on 03/12/16.
 */
//resizeAndDrag
$(function() {
    $( "#chat" ).draggable({ containment: "parentChat" });
    $( "#chat" ).resizable({ containment: "parentChat" });
});
