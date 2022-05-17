<header class="d_flex justify_content_around align_items_center">

    <div>
        <a class="home_logo" href="<?= URL ?>accueil"><img src="<?= URL ?>public/img/cdlm.png" alt="logo" id="header_logo" class="header_logo"></a>
    </div>
   
        <div class="home">
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li class="m_10"><a href="<?= URL ?>accueil" >Accueil</a>
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
                    <li class="m_10"><a href="<?= URL ?>actualites" >Actualités</a>
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
                    <li class="m_10"><a href="<?= URL ?>gestion">Gestion</a>
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
                    <li class="m_10"><a href="<?= URL ?>etudiant" >Etudiants</a>
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
                    <li class="m_10"><a href="<?= URL ?>coaching">Coaching</a>
                        <ul>
                            <li><a href="<?= URL ?>">Coaching-1</a></li>
                            <li><a href="<?= URL ?>">Coaching-2</a></li>
                            <li><a href="<?= URL ?>">Coaching-3</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li class="m_10"><a href="<?= URL ?>projet">Projet</a>                      
                    </li>
                </ul>
            </nav>
            <nav class="Menu">
                <ul class="menu_accordeon">
                    <li class="m_10"><a href="<?= URL ?>contact">Contact</a>                    
                    </li>
                </ul>
            </nav>
            </div>
</header>
<?php if (!is_connected()) : ?>
        
        <div class="connection" id="connection">
            <a href="<?= URL ?>connexion" class="btn btn_connexion"><i class="fa-solid fa-power-off mr_5"></i>Se connecter</a>
            <a href="<?= URL ?>inscription" class="btn btn_connexion">S'inscrire</a>
        </div>
<?php endif ?>