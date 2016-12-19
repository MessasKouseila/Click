$("#imageMessage").click( function () {

        $("#fichierMessage").trigger("click");
    });

$("input[type=file]").change(function (event) {
    //alert(URL.createObjectURL(event.target.files[0]));
    $("#imageMessage").addClass("active");
    $("#image").html("<img src='" +URL.createObjectURL(event.target.files[0]) +"' class='img-responsive' height='40' width='40' style='display: inline;' > " +
        " <span class='btn  btn-xs btn-danger active' id='removeImage'>"+
        " <span class='glyphicon glyphicon glyphicon-remove-circle'></span>"+
        "</span>" +
        ""+
        "");
});


$('#image').on('click', '#removeImage', function() {
    $("#imageMessage").removeClass("active");
    $("#fichierMessage").val("");
    $("#image").html("");
}
);





