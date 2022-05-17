<footer class=" footer">
    <div class="d_flex justify_content_around  p_30">
        <div>
        <p class="footer_logo">CDLM@Invest</p>
        <a  href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a> | <a href="#">Plan du site</a>
        </div>
        <div class="newsletter">
            <a href="#">Abonnez-vous <br/>à notre Newsletter</a>
        </div>
        <div >
        <p>Tous droits réservés.</p>
        <span class="mr_5">FINTECH</span> <i class="fa-solid fa-copyright mr_5"></i><span>2022</span>
        </div>
       
    </div>
</footer>

<!-- ajout de page js spécifique aved le mainController -->
<?php if (!empty($page_javascript)) : ?>
    <?php foreach ($page_javascript as $fichier_javascript) : ?>
        <script src="<?= URL?><?= $fichier_javascript ?>" type="text/javascript"></script>
    <?php endforeach; ?>
<?php endif; ?>