<div class="d_flex justify_content_center align_items_center">
    <a href="<?= URL ?>user/projet/afficher/<?= $projet->getId() ?>" class="btn m_5">Retour</a>
</div>

<ul id="accordeon">
    <?php foreach ($annees as $annee) : ?>
        <?php if ($annee['name_annee'] != "debut N") { ?>
            <li>
                <form action="<?= URL ?>user/projet/updateData/<?= $annee['name_annee'] ?>" method="POST">
                    <label for="<?= $annee['name_annee'] ?>"><?= $annee['name_annee'] ?></label>
                    <input type="checkbox" id="<?= $annee['name_annee'] ?>" />
                    <ul class="sub">
                        <li>Chiffre d'affaires : <input type="number" value="<?= $annee['chiffre_affaire'] ?>" id="chiffre_affaire"></li>
                        <li>Achat annuels : <input type="number" value="<?= $annee['achats_annuels'] ?>" id="achats_annuels"></li>
                        <li>Charges structures : <?= $annee['charges_structures'] ?></li>
                        <li>amortissements : <?= $annee['amortissements'] ?></li>
                        <li>Augmentation BFR :<?= $annee['augmentation_bfr'] ?> </li>
                        <li>Valeur résiduelle nette : <?= $annee['valeur_residuelle_nette_is'] ?></li>
                        <li><button type="submit">Enregistrer</button></li>
                    </ul>
                </form>
            </li>
        <?php } else { ?>
            <li>
                <form action="<?= URL ?>user/projet/update" method="POST">

                </form>
            </li>
        <?php } ?>
    <?php endforeach ?>
</ul>