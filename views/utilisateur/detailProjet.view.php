<div class="d_flex justify_content_center align_items_center">
    <div id="bnt_home" class="btn m_5">Home</div>
    <div id="btn_data" class="btn m_5">Données d'entrées</div>
</div>

<div id="page_home">
    <p class="card_detail"> Description : <?= $projet->getDescription_projet() ?></p>
    <p class="card_investissement">Investissement : <?= $projet->getInvestissement() ?> Euros</p>
    <p class="card_duree">Durée du projet : <?= $projet->getDuree() ?> ans</p>
</div>

<div id="donnees_entrees">
    <form action="<?= URL ?>updateDataProjet" method="POST">
        <table class="text_center">
            <tr>
                <th>Année</th>
                <th>Chiffre d'affaires</th>
                <th>Achat annuels</th>
                <th>charges structures</th>
                <th>amortissements</th>
                <th>augmentation BFR</th>
                <th>IS</th>
            </tr>
            <?php foreach ($annees as $annee) : ?>
                <tr>
                    <td><?= $annee['name_annee'] ?></td>
                    <td><input type="text" value="<?= $annee['chiffre_affaire'] ?>"></td>
                    <td><input type="text" value="<?= $annee['achats_annuels'] ?>"></td>
                    <td><input type="text" value="<?= $annee['charges_structures'] ?>"></td>
                    <td><input type="text" value="<?= $annee['amortissements'] ?>"></td>
                    <td><input type="text" value="<?= $annee['augmentation_bfr'] ?>"></td>
                    <td><input type="text" value="<?= $annee['valeur_residuelle_nette_is'] ?>"></td>
                </tr>

            <?php endforeach ?>
        </table>
        <button type="submit" class="btn btn_success mt_10 m_auto d_block w_50">Sauvegarder</button>
    </form>
</div>

<!-- script -->
<script>
    const btnProjet = document.querySelector("#bnt_home")
    const btnData_entrée = document.querySelector("#btn_data")

    let donnees_entrees = document.querySelector("#donnees_entrees")
    let homeProjet = document.querySelector("#page_home")
    donnees_entrees.style.display = "none"

    btnData_entrée.addEventListener('click', () => {
        donnees_entrees.style.display = "block"
        homeProjet.style.display = "none"
    })
    btnProjet.addEventListener("click", () => {

        donnees_entrees.style.display = "none"
        homeProjet.style.display = "block"
    })
</script>