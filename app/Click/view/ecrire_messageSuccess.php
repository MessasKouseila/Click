<div class="well">
    <form>
        <div class="input-group">
                <span class="input-group-addon btn btn-primary" id="imageMessage">
                    <span class="glyphicon glyphicon-picture"></span>
                </span>
            <textarea class="form-control" rows="3" placeholder="Ecrivez votre message"></textarea>

        </div>
        <p></p>
        <div class="row">

            <a href="#" class="btn btn-info pull-right">
                Envoyer
            </a>
        </div>
        <input type="file" class="hide" id="fichierMessage" name="image">
    </form>
<script>
   $("#imageMessage").click( function () {
           alert("aaaa");
           $("#fichierMessage").trigger("click")
   }
        );

</script>
</div>


