<!DOCTYPE html>
<html lang="fr">
<!-- appelle du head (favicon, css, ...) -->
<?php require "./views/commun/head.php" ?>


<!-- mise en place du body -->

<body class="d_flex flex_fill flex_column">
    <?php require "./views/commun/header.php" ?>
    
    <div class="d_flex flex_fill justify_content_start container">
        <!-- partie contenu de la page -->
        <div class="d_flex flex_column flex_fill align_items_center">
        <?php if(isset($page_titre)){ echo "<h1 class='my_20'>".$page_titre."</h1>"; } ?>
        <?php
        var_dump($_SESSION);
        if (!empty($_SESSION['alert'])) {
            foreach ($_SESSION['alert'] as $alert) {
                echo "<div class='alert' " . $alert['type'] . " m_10' role='alert'>
                    " . $alert['message'] . "
                </div>";
            }
            unset($_SESSION['alert']);
        }
        ?>
            <!-- information reçu du controller -->
            <?= $page_content ?>
        </div>
    </div>

    <?php require "./views/commun/footer.php" ?>


</body>

</html>