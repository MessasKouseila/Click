<div class="well text-left" id="statutModif">
        <p id="textStatus">Status: <?php $context->user->statut ?></p>
            <?php if($context->isuser) : ?>
            <button type="button" class="btn btn-default btn-sm" id="modifier">Modifier</button>
        <?php endif; ?>
</div>
<?php if($context->isuser) : ?>
    <script>
            $("#modifier").click(

                function () {
                        $("#textStatus").html("Status:  <div class=\"form-group input-group\">"
                        +"<input type=\"text\" class=\"form-control\" placeholder=\"Entrez votre nouveau statut\">"
                         +  " <span class=\"input-group-btn\">"
                         +   "<button class=\"btn btn-default btn-danger active\" type=\"button\" id=\"textStatut\">.<span class=\"glyphicon glyphicon-remove\"> </span></button>"
                          +  "</span></div>");});
            $('#statutModif').on('click', '#textStatut', function() {
                    $("#textStatus").html("Status: <?php $context->user->statut ?>");
            });

    </script>
<?php endif; ?>