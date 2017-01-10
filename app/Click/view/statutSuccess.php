<div class="alert-success center" id="alertModificationStatut"></div>
<div class="well text-left" id="statutModif">
    <p id="textStatus"><?php echo "Statut: " . $context->user->statut; ?> </p>
    <?php if($context->isuser) : ?>
        <button type="button" class="btn btn-default btn-sm" id="modifier">Modifier</button>
    <?php endif; ?>
</div>