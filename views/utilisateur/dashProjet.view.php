<div class="d_flex justify_content_center align_items_center">
    <a href="<?= URL ?>user/projet/afficher/<?= $projet->getId() ?>/data" class="btn m_5">Données d'entrées</a>
</div>

<div id="page_home">
    <p class="card_detail"> Description : <?= $projet->getDescription_projet() ?></p>
    <p class="card_investissement">Investissement : <?= $projet->getInvestissement() ?> Euros</p>
    <p class="card_duree">Durée du projet : <?= $projet->getDuree() ?> ans</p>



    <canvas id="chart_chiffre_affaires" width="300" height="300"></canvas>
</div>






<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script>
    const chart_chiffre_affaires = document.querySelector('#chart_chiffre_affaires').getContext('2d');

    const label_chiffre_affaires = [
        <?php foreach ($annees as $annee) {
            echo "'" . $annee->getName_annee() . "',";
        } ?>
    ];
    const data_chiffre_affaires = [
        <?php foreach ($annees as $annee) {
            echo "'" . $annee->getChiffre_affaire() . "',";
        } ?>
    ]

    const myChart = new Chart(chart_chiffre_affaires, {
        type: 'line',
        data: {
            labels: label_chiffre_affaires,
            datasets: [{
                label: 'Chiffre d\'affaires :',
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
</script>