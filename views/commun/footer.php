<footer class="d_flex  footer">
    <div class="d_flex justify_content_center align_items_center">
        <p>CDLM@Invest</p>
        <p>Tous droits réservés.</p>
        <span class="mr_5">FINTECH</span> <i class="fa-solid fa-copyright mr_5"></i><span>2022</span>
    </div>
</footer>

<!-- ajout de page js spécifique aved le mainController -->
<?php if (!empty($page_javascript)) : ?>
    <?php foreach ($page_javascript as $fichier_javascript) : ?>
        <script src="<?= URL?><?= $fichier_javascript ?>" type="text/javascript"></script>
    <?php endforeach; ?>
<?php endif; ?>