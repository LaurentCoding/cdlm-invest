<div>
    <h4>Description :</h4>
    <p><?= $projet->getDescription_projet() ?></p>
    <p>Investissement : <?= $projet->getInvestissement() ?> Euros</p>
    <p>Durée du projet : <?= $projet->getDuree() ?> ans</p>
</div>

<div>
    <?php foreach($annees as $annee) : ?>
        <span><?= $annee['name_annee'] ?></span>

    <?php endforeach ?>
</div>
