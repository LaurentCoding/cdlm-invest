<div class="text_center w_100 mt_20 mb_20">
    <p class="m_5">Projet : <?= $nbrProjet ?> / 3 </p>
    <?php if($nbrProjet >=3) : ?>
    <a href="#" class="btn">Débloquer la limite</a>
    <?php endif ?>
</div>


<?php if (!empty($projets)) : ?>
    <div class="card_container text_center w_100 d_flex">
        <?php foreach ($projets as $projet) : ?>

            <div class="card card_projet w_50  br_10 p_15 m_10 d_flex flex_column  ">

                <!-- affichage nom projet -->
                <h3 class="card_title"><?= $projet->getNom_projet() ?></h3>

                <!-- affichage modification non projet -->
                <form action="<?= URL ?>user/projet/update/nom_projet/<?= $projet->getId() ?>" method="POST">
                    <h3><input type="text" name="nomProjet" id="nomProjet" value="<?= $projet->getNom_projet() ?>"></h3>
                    <button type="submit">Modifier</button>
                </form>

                <!-- affichage description -->
                <div class="p_10"><?= $projet->getDescription_projet() ?></div>

                <!-- afficher modifier description -->
                <form action="<?= URL ?>user/projet/update/description_projet/<?= $projet->getId() ?>" method="POST">
                    <textarea name="descriptionProjet" id="descriptionProjet" cols="20" rows="2" class="m_10"><?= $projet->getDescription_projet() ?></textarea>
                    <button type="submit">Modifier</button>
                </form>
                
                
                <a href="<?= URL ?>user/projet/afficher/<?= $projet->getId() ?>" class="btn m_5">Allez</a>
                <a href="<?= URL ?>user/projet/delete/<?= $projet->getId() ?>" class="btn btn_warning m_5">Supprimer</a>
                </div>
            
            
        <?php endforeach ?>
    </div>

<?php endif ?>

<?php if ($nbrProjet >= 3) { ?>
    <button class="btn mt_20" disabled>Maximum de projet atteint</button>
<?php } else { ?>
    <a href="<?= URL ?>user/projet/new" class="btn mt_20">Crée un nouveau projet</a>
<?php } ?>