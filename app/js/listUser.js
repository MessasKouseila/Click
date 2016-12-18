$( function() {
    // run the  currently selected effect
    function runEffect() {
        // get effect type from
        var selectedEffect = $( "#effectTypes" ).val();
        // Most effect types need no options passed by default
        var options = {};
        // some effects have required parameters
        if ( selectedEffect === "scale" ) {
            options = { percent: 50 };
        } else if ( selectedEffect === "size" ) {
            options = { to: { width: 200, height: 60 } };
        }
        // Run the effect
        $( "#effect" ).toggle( "blind", options, 500 );
    };

    // Set effect from select menu value

    $( "#animation" ).on( "click", function() {
        $( "#animation" ).addClass("hide");
        runEffect();
    });
    $( "#buttonreduire" ).on( "click", function() {
        $( "#animation" ).trigger("click");
        $( "#animation" ).removeClass("hide");
    });
});