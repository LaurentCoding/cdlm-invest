<div class="card br_10 p_15">
<div>
    <h4 class="card_description"></h4>Description :</h4>
    <p class="card_detail"><?= $projet->getDescription_projet() ?></p>
    <p class="card_investissement">Investissement : <?= $projet->getInvestissement() ?> Euros</p>
    <p class="card_duree">Durée du projet : <?= $projet->getDuree() ?> ans</p>
</div>

<div>
    <?php foreach($annees as $annee) : ?>
        <span><?= $annee['name_annee'] ?></span>

    <?php endforeach ?>
</div>

</div>
