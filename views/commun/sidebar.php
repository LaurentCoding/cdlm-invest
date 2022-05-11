<div class="d_flex flex_column pt_20 w_15 align_items_center" id="sidebar">
    <?php if (!is_connected()) : ?>
        <div class="d_flex flex_column">
            <a href="<?= URL ?>connexion" class="btn btn_success mb_10  pl_5"><i class="fa-solid fa-power-off mr_5"></i>Se connecter</a>
            <a href="<?= URL ?>inscription" class="btn btn_secondary mb_10  pl_5">S'inscrire</a>
        </div>
    <?php endif ?>
    <?php if (is_connected()) : ?>
        <div class="d_flex flex_column">
            <?php if ($_SESSION['avatar'] != "none") : ?>
                <div class="d_flex justify_content_center align_items_center w_100">
                    <img src="<?= URL . $_SESSION['avatar'] ?>" alt="avatar" class="img_rounded_50 m_10 m_auto d_block" id="avatar_sidebar">
                </div>

            <?php endif ?>
            <a href="<?= URL ?>logout" class="mb_10 pl_5" id="btn_logout"><i class="fa-solid fa-power-off"></i></a>
        </div>
    <?php endif ?>
    <div class="separator_secondary mb_10 w_75"></div>
    <?php if (is_connected()) : ?>
        <div class="d_flex flex_column w_100 hidden">
            <a href="<?= URL ?>accueil" class="mb_10 ml_5 d_flex justify_content_center align_items_center <?php if ($_SESSION['page'] == "accueil") { ?> active <?php } ?>">Home</a>
            <a href="<?= URL ?>user/profil" class="mb_10 ml_5 d_flex justify_content_center align_items_center <?php if ($_SESSION['page'] == "profil") { ?> active <?php } ?>"><i class="fa-solid fa-user mr_5"></i>Profil</a>
            <a href="<?= URL ?>user/projet" class="mb_10 ml_5 d_flex justify_content_center align_items_center <?php if ($_SESSION['page'] == "projet") { ?> active <?php } ?>"><i class="fa-solid fa-file mr_5"></i>Projets</a>
            <?php if ($_SESSION['admin'] == 1) : ?>
                <a href="<?= URL ?>admin" class="mb_10 ml_5 d_flex justify_content_center align_items_center">Administrateur</a>
            <?php endif ?>
        </div>
    <?php endif ?>
</div>