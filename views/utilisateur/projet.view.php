<div class="text_center w_100 mt_20 mb_20">
    <p class="m_5">Projet : <?= $nbrProjet ?> / 3 </p>
    <?php if ($nbrProjet >= 3) : ?>
        <a href="#" class="btn">Débloquer la limite</a>
    <?php endif ?>
</div>
<?php $card = 0 ?>
<?php if (!empty($projets)) : ?>
    <div class="card_container text_center w_100 d_flex justify_content_center">

        <!-- card -->
        <?php foreach ($projets as $projet) : ?>
            <div class="card card_projet w_30 br_10 p_15 m_10 d_flex flex_column ">
                <i id="<?= $card ?>" class="fa-solid fa-pencil btn_update_card"></i>
                <!-- affichage nom projet -->
                <div class="d_flex justify_content_around m_10">
                    <h3 class="card_title"><?= $projet->getNom_projet() ?></h3>

                    <!-- affichage modification non projet -->
                    <form class="form_nom_projet d_flex flex_column align align_items_center " action="<?= URL ?>user/projet/update/nom_projet/<?= $projet->getId() ?>" method="POST">
                        <input type="text" name="nomProjet" id="nomProjet" value="<?= $projet->getNom_projet() ?>">
                        <button class="card_projet-btn btn mt_10" type="submit">Modifier</button>
                    </form>
                </div>
                <!-- affichage description -->
                <div class="d_flex justify_content_around">
                    <h3 class="p_10 card_description"><?= $projet->getDescription_projet() ?></h3>

                    <!-- afficher modifier description -->
                    <form class=" form_description_projet d_flex flex_column align_items_center justify_content_center" action="<?= URL ?>user/projet/update/description_projet/<?= $projet->getId() ?>" method="POST">
                        <textarea name="descriptionProjet" id="descriptionProjet" cols="20" rows="2" class="m_10 br_5 p_5"><?= $projet->getDescription_projet() ?></textarea>
                        <button class="card_projet-btn btn  mt_10" type="submit">Modifier</button>
                    </form>
                </div>

                <div class="d_flex justify_content_around ">
                    <div class="p_10">Investissement : <?= $projet->getInvestissement() ?> euros</div>
                    <div class="p_10">nombre d'année(s) : <?= $projet->getDuree() ?>
                        <?php if ($projet->getDuree() > 1) {
                            echo "ans";
                        } else {
                            echo "an";
                        } ?></div>
                </div>

                <div class="m_20">
                    <a href="<?= URL ?>user/projet/afficher/<?= $projet->getId() ?>" class="btn btn_project m_5">Voir</a>
                    <a href="<?= URL ?>user/projet/delete/<?= $projet->getId() ?>" class="btn btn_warning m_5">Supprimer</a>
                </div>
            </div>
            <?php $card += 1 ?>
        <?php endforeach ?>
    </div>

<?php endif ?>

<?php if ($nbrProjet >= 3) { ?>
    <button class="btn mt_20 mb_10" disabled>Maximum de projet atteint</button>
<?php } else { ?>
    <a href="<?= URL ?>user/projet/new" class="card_newProject btn mt_20">Crée un nouveau projet</a>
<?php } ?>




<script>
    const form_nom_projet = document.querySelectorAll('.form_nom_projet');
    const form_description_projet = document.querySelectorAll('.form_description_projet');
    const btn_form_card = document.querySelectorAll(".btn_update_card");

    const titre_brut = document.querySelectorAll('.card_title');
    const description_brut = document.querySelectorAll('.card_description');

    // ------------------------
    for (i = 0; i < form_nom_projet.length; i++) {
        form_nom_projet[i].style.display = "none"
    }
    for (i = 0; i < form_description_projet.length; i++) {
        form_description_projet[i].style.display = "none"
    }
    // ---------------------

    for (i = 0; i < btn_form_card.length; i++) {
        btn_form_card[i].addEventListener('click',
            (e) => {
                i = e.target.id
                form_nom_projet[i].style.display = "block"
                form_description_projet[i].style.display = "block"
                titre_brut[i].style.display = "none"
                description_brut[i].style.display = "none"
                btn_form_card[i].style.display = "none"
            }
        )
    }

</script>