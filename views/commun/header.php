<header class="d_flex justify_content_around align_items_center">

    <div>
        <a class="home_logo" href="<?= URL ?>accueil"><img src="<?= URL ?>public/img/cdlm.png" alt="logo" id="header_logo" class="header_logo"></a>
    </div>
    <?php if (!is_connected()) : ?>
        
        <div class="connection" id="connection">
            <a href="<?= URL ?>connexion" class="btn btn_connexion"><i class="fa-solid fa-power-off mr_5"></i>Se connecter</a>
            <a href="<?= URL ?>inscription" class="btn btn_connexion">S'inscrire</a>
        </div>
        <div class="d_flex justify_content_center">
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li><a href="<?= URL ?>accueil" class="btn btn_connexion">Accueil</a>
                        <ul>
                            <li><a href="<?= URL ?>sommeNous">Qui sommes-nous?</a></li>
                            <li><a href="<?= URL ?>">Notre histoire</a></li>
                            <li><a href="<?= URL ?>">Nos valeurs</a></li>      
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li><a href="<?= URL ?>actualites" class="btn btn_connexion">Actualités</a>
                        <ul>
                            <li><a href="">Juridiques</a></li>
                            <li><a href="">Economiques</a></li>
                            <li><a href="">Social</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li><a href="<?= URL ?>gestion" class="btn btn_connexion">Gestion</a>
                        <ul>
                            <li><a href="<?= URL ?>">Comptabilité</a></li>
                            <li><a href="<?= URL ?>">Rémunérer</a></li>
                            <li><a href="<?= URL ?>">Recruter</a></li> 
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li><a href="<?= URL ?>etudiant" class="btn btn_connexion">Etudiants</a>
                        <ul>
                            <li><a href="<?= URL ?>">Entreprenariat Féminin</a></li>
                            <li><a href="<?= URL ?>">Entreprenariat Masculin</a></li>
                            <li><a href="<?= URL ?>">Développement</a></li> 
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li><a href="<?= URL ?>coaching" class="btn btn_connexion">Coaching</a>
                        <ul>
                            <li><a href="<?= URL ?>">Coaching-1</a></li>
                            <li><a href="<?= URL ?>">Coaching-2</a></li>
                            <li><a href="<?= URL ?>">Coaching-3</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div>
                <a href="<?= URL ?>projet" class="btn btn_connexion">Projet</a>
                <a href="<?= URL ?>contact" class="btn btn_connexion">Contact</a>
            </div>
        </div>
    <?php endif ?>
    
</header>