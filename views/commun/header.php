<header class="d_flex justify_content_between align_items_center mb_10 p_10">
    <div>
        <a class="ml_40" href="<?= URL ?>accueil"><img src="<?= URL ?>public/img/cdlm.png" alt="logo" id="header_logo"></a>
    </div>
    <nav class="mr_30">
        <label for="toggle"><span id="burger" class="close"></span></label>
        <input type="checkbox" id="toggle">
        <div class="menu d_flex justify_content_center align_items_center">
            <a class="m_5 br_5 p_5" href="<?= URL ?>qui-sommes-nous">Qui sommes-nous?</a>
            <a class="m_5 br_5 p_5" href="<?= URL ?>nos-expertises">Nos expertises</a>
            <a class="m_5 br_5 p_5" href="<?= URL ?>nos-solutions">Nos solutions</a>
            <a class="m_5 br_5 p_5" href="<?= URL ?>blog">Blog</a>
            <a class="m_5 br_5 p_5" href="<?= URL ?>contact">Contact</a>


            <div id="profil">
                <?php if (is_connected() && $_SESSION['avatar'] != "none") { ?>
                    <div id="profil_connect" class="d_flex justify_content_center align_items_center">
                        <img src="<?= URL . $_SESSION['avatar'] ?>" alt="<?= $_SESSION['avatar'] ?>"><span class="ml_5"><?= $_SESSION['surname'] ?></span>
                    </div>

                <?php } else { ?>
                    <div class="d_flex justify_content_center align_items_center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--healthicons" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                            <g fill="currentColor">
                                <path fill-rule="evenodd" d="M24 42c9.941 0 18-8.059 18-18S33.941 6 24 6S6 14.059 6 24s8.059 18 18 18Zm0 2c11.046 0 20-8.954 20-20S35.046 4 24 4S4 12.954 4 24s8.954 20 20 20Z" clip-rule="evenodd"></path>
                                <path d="M12 35.63c0-1.033.772-1.906 1.8-2.02c7.715-.854 12.72-.777 20.418.019a1.99 1.99 0 0 1 1.108 3.472c-9.085 7.919-14.277 7.81-22.686.008c-.41-.38-.64-.92-.64-1.478Z"></path>
                                <path fill-rule="evenodd" d="M34.115 34.623c-7.637-.79-12.57-.864-20.206-.019A1.028 1.028 0 0 0 13 35.631c0 .286.119.557.32.745c4.168 3.866 7.326 5.613 10.413 5.624c3.098.011 6.426-1.722 10.936-5.652a.99.99 0 0 0-.554-1.724ZM13.69 32.616c7.796-.863 12.874-.785 20.632.018a2.99 2.99 0 0 1 1.662 5.221c-4.575 3.988-8.385 6.16-12.257 6.145c-3.883-.014-7.525-2.223-11.766-6.158A3.018 3.018 0 0 1 11 35.63a3.028 3.028 0 0 1 2.69-3.015Z" clip-rule="evenodd"></path>
                                <path d="M32 20a8 8 0 1 1-16 0a8 8 0 0 1 16 0Z"></path>
                                <path fill-rule="evenodd" d="M24 26a6 6 0 1 0 0-12a6 6 0 0 0 0 12Zm0 2a8 8 0 1 0 0-16a8 8 0 0 0 0 16Z" clip-rule="evenodd"></path>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--material-symbols" width="15" height="15" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 14.975q-.2 0-.387-.075q-.188-.075-.313-.2l-4.6-4.6q-.275-.275-.275-.7q0-.425.275-.7q.275-.275.7-.275q.425 0 .7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275q.425 0 .7.275q.275.275.275.7q0 .425-.275.7l-4.6 4.6q-.15.15-.325.212q-.175.063-.375.063Z"></path>
                        </svg>
                    </div>
                <?php } ?>
                <div class="d_flex flex_column" id="subProfil">
                    <?php if (!is_connected()) { ?>
                        <a href="<?= URL ?>connexion" class="btn_profil m_5"><i class="fa-solid fa-power-off mr_5"></i>Se connecter</a>
                        <a href="<?= URL ?>inscription" class="btn_profil m_5">S'inscrire</a>
                    <?php } else { ?>
                        <a href="<?= URL ?>user/profil" class="btn_profil m_5">Profils</a>
                        <a href="<?= URL ?>user/projet" class="btn_profil m_5">Projets</a>
                        <a href="<?= URL ?>logout" class="btn_profil m_5 d_flex justify_content_center align_items_center">
                            <svg class="mr_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--material-symbols" width="15" height="15" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13v-2h8.65L9.1 8.45L10.5 7l5 5l-5 5l-1.4-1.45L11.65 13Zm2 2v4h14V5H5v4H3V5q0-.825.587-1.413Q4.175 3 5 3h14q.825 0 1.413.587Q21 4.175 21 5v14q0 .825-.587 1.413Q19.825 21 19 21H5q-.825 0-1.413-.587Q3 19.825 3 19v-4Z"></path>
                            </svg>
                            Déconnexion
                        </a>
                    <?php } ?>
                </div>
            </div>
    </nav>
</header>