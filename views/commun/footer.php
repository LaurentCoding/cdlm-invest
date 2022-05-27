<footer  class="d_flex justify_content_around p_30 flex_row_wrap">
    
    <div>
        <p class="footer_logo text_center">CDLM@Invest</p>
        <a  href="<?= URL ?>">Mentions légales</a> | <a href="<?= URL ?>">Politique de confidentialité</a> | <a href="<?= URL ?>">Plan du site</a>
    </div>
    
    <div class="text_center newsletter">
        <a href="<?= URL ?>">Abonnez-vous <br/>à notre Newsletter</a>
    </div>
    <div class="text_center reserve">
        <p>Tous droits réservés.</p>
        <p><span class="mr_5">FINTECH</span> <i class="fa-solid fa-copyright mr_5"></i><span>2022</span></p>
    </div>
   


</footer>
<script src="../../public/js/hamburger.js"></script>
<!-- ajout de page js spécifique avec le mainController -->
<?php if (!empty($page_javascript)) : ?>
    <?php foreach ($page_javascript as $fichier_javascript) : ?>
        <script src="<?= URL?><?= $fichier_javascript ?>" type="text/javascript"></script>
    <?php endforeach; ?>
<?php endif; ?>