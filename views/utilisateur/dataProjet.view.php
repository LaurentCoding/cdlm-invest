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
                        <li>Chiffre d'affaires : <input type="number" value="<?= $annee['chiffre_affaire'] ?>" id="chiffre_affaire" name="chiffre_affaire"> €</li>
                        <li>Achat annuels : <input type="number" value="<?= $annee['achats_annuels'] ?>" id="achats_annuels" name="achats_annuels"> €</li>
                        <li>Charges structures : <input type="number" value="<?= $annee['charges_structures'] ?>" id="charges_structures" name="charges_structures"> €</li>

                        <li>amortissements : <input type="number" value="<?= $annee['amortissements'] ?>" id="amortissements" name="amortissements"> €</li>
                        <li>Augmentation BFR : <input type="nmber" value="<?= $annee['augmentation_bfr'] ?>" id="augmentation_bfr" name="augmentation_bfr"> €</li>
                        <li>Valeur résiduelle nette : <input type="number" value="<?= $annee['valeur_residuelle_nette_is'] ?>" id="valeur_residuelle_nette_is" name="valeur_residuelle_nette_is"> €</li>
                        <li><button type="submit" class="btn">Enregistrer</button></li>
                    </ul>
                </form>
            </li>
        <?php } else { ?>
            <li>
                <label for="<?= $annee['name_annee'] ?>"><?= $annee['name_annee'] ?></label>
                <input type="checkbox" id="<?= $annee['name_annee'] ?>" />
                <ul class="sub">
                    <li>Investissement : <input type="number" value="<?= $projet->getInvestissement() ?>" name="<?= $projet->getInvestissement() ?>" id="<?= $projet->getInvestissement()  ?>"> €</li>
                </ul>
            </li>
        <?php } ?>
    <?php endforeach ?>
</ul>