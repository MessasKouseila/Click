<div class="alert-success center" id="alertEnvoiMessage"></div>
<div class="well" id="formulaire_envoie">
    <form method="post" action="Click.php?action=envoyerMessage" enctype="multipart/form-data" id="formEnvoiMessage">
        <div class="input-group">
            <span class="input-group-addon btn btn-primary" id="imageMessage">
                <span class="glyphicon glyphicon-picture"></span>
            </span>
            <textarea class="form-control" rows="3" placeholder="Ecrivez votre message" name="message" id="textareaMessage"></textarea>
        </div>
        <p></p>
        <div class="row" id="sendBtnDiv">
            <input type="submit" class="btn btn-info pull-right" id="envoyerMessage" value="Envoyer">
            <div class=" pull-left" id="image"></div>
        </div>
        <input type="file" class="hide" id="fichierMessage" name="image" accept="image/*">
        <input type="text" class="hide" value="<?php echo $context->user->id; ?>" name="id">
    </form>
</div>
