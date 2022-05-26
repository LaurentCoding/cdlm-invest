<div class="d_flex justify_content_center align_items_center">
    <a href="<?= URL ?>user/projet/afficher/<?= $projet->getId() ?>/data" class="btn m_5">Données d'entrées</a>
</div>

<div id="page_home">
    <p class="card_detail"> Description : <?= $projet->getDescription_projet() ?></p>
    <p class="card_investissement">Investissement : <?= $projet->getInvestissement() ?> Euros</p>
    <p class="card_duree">Durée du projet : <?= $projet->getDuree() ?> ans</p>
</div>

