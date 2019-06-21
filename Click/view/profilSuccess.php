
<p>
    <a href="#"><?php echo $context->user->nom." ".$context->user->prenom;?></a>
</p>
<?php if($context->isuser):?>
    <a href="#" data-toggle="modal" data-target="#imageProfil" id="imagePP" class="btn">
        <img src="<?php echo ($context->user->avatar === NULL)?"image/default.jpeg":$context->user->avatar ;?>" class="img-circle" height="65" id="PP" width="65" alt="Avatar">
    </a>
<?php else: ?>
    <img src="<?php echo ($context->user->avatar === NULL)?"image/default.jpeg":$context->user->avatar ;?>" class="img-circle" height="65"  id="PP" width="65" alt="Avatar">
<?php endif; ?>
<p>Né(e) Le : <?php echo $context->user->date_de_naissance->format('Y-m-d');?></p>


<!-- Modal -->
<div class="modal fade" id="imageProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Changer votre photo de profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="Click.php?action=modificationPP" enctype="multipart/form-data" id="formPP">
                    <input type="file"  id="fichierPP" name="image" accept="image/*">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="changePP" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>

</div>

