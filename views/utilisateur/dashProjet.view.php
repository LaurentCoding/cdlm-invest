<?php

// calcul chiffre d'affaire moyen
$chiffre_affaires_moyen = 0;
$moyenne = 0;
foreach ($annees as $annee) {
    $chiffre_affaires_moyen += $annee->getChiffre_affaire();
    $moyenne += 1;
};
$chiffre_affaires_moyen = $chiffre_affaires_moyen / $moyenne;
// -- end moyenne


// calcul charge RCAI IS , résultat NET et CAF
$total_charge = array();
$RCAI = array();
$is = array();
$resultat_net = array();
$CAF = array();
$flux_economique = array();
$taux_actualisation = array();
$annee_taux = 1;
$flux_economique_actualise = array();
$somme_bfr = 0;

foreach ($annees as $annee) {
    $somme_bfr += $annee->getAugmentation_bfr();
    $total_charge =   array_merge($total_charge, [$annee->getName_annee() => $annee->getAchats_annuels() + $annee->getCharges_structures() + $annee->getAmortissements()]);
    $RCAI = array_merge($RCAI, [$annee->getName_annee() => $annee->getChiffre_affaire() - $total_charge[$annee->getName_annee()]]);
    $is = array_merge($is, [$annee->getName_annee() => $RCAI[$annee->getName_annee()] * 0.25]);
    $resultat_net = array_merge($resultat_net, [$annee->getName_annee() => $RCAI[$annee->getName_annee()] - $is[$annee->getName_annee()]]);
    $CAF = array_merge($CAF, [$annee->getName_annee() => $annee->getAmortissements() + $resultat_net[$annee->getName_annee()]]);

    if($annee->getName_annee() != "debut N"){

        if($projet->getDuree()-1 == $annee_taux){
            $flux_economique = array_merge($flux_economique, [$annee->getName_annee() => $CAF[$annee->getName_annee()] + $annee->getValeur_residuelle_nette_is() + $somme_bfr - $annee->getAugmentation_bfr()]);
        }else{
            $flux_economique = array_merge($flux_economique,[$annee->getName_annee() =>$CAF[$annee->getName_annee()] + $annee->getValeur_residuelle_nette_is() - $annee->getAugmentation_bfr()]);
        }

        $taux_actualisation = array_merge($taux_actualisation, [$annee->getName_annee() => pow((1+0.1236),(-$annee_taux))]);
        $annee_taux += 1;
        $flux_economique_actualise = array_merge($flux_economique_actualise, [$annee->getName_annee() => $flux_economique[$annee->getName_annee()]*$taux_actualisation[$annee->getName_annee()]]);
    }else{
        $flux_economique = array_merge($flux_economique, [$annee->getName_annee() => $projet->getInvestissement() - $annee->getAugmentation_bfr() ]);
    }
}


?>
<div class="d_flex justify_content_center align_items_center">
    <a href="<?= URL ?>user/projet/afficher/<?= $projet->getId() ?>/data" class="btn m_5">Données d'entrées</a>
</div>

<div id="page_home">
    <p class="card_detail"> Description : <?= $projet->getDescription_projet() ?></p>
    <p class="card_investissement">Investissement : <?= $projet->getInvestissement() ?> euros</p>
    <p class="card_duree">Durée du projet : <?= $projet->getDuree() ?> ans</p>
    <p>Chiffre d'affaires moyen : <?= $chiffre_affaires_moyen ?> euros</p>

    <pre>
        <?= var_dump($flux_economique); ?>
    </pre>

    <div>
        <canvas id="chart_chiffre_affaires" width="300" height="300"></canvas>
        <canvas id="chart_CAF" width="300" height="300"></canvas>
    </div>

</div>






<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script>
    const chart_chiffre_affaires = document.querySelector('#chart_chiffre_affaires').getContext('2d');
    const chart_CAF = document.querySelector('#chart_CAF').getContext('2d');




    const label = [
        <?php foreach ($annees as $annee) {
            echo "'" . $annee->getName_annee() . "',";
        } ?>
    ];
    const data_chiffre_affaires = [
        <?php foreach ($annees as $annee) {
            echo "'" . $annee->getChiffre_affaire() . "',";
        } ?>
    ]
    const data_CAF = [
        <?php foreach ($CAF as $key => $value) {
            echo "'" . $value . "',";
        }
        ?>
    ]

    const chartChiffreAffaire = new Chart(chart_chiffre_affaires, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Chiffre d\'affaires',
                data: data_chiffre_affaires,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const chartCAF = new Chart(chart_CAF, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'CAF',
                data: data_CAF,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>