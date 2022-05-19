<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- appelle du favicon dans le dossier public -->
    <link rel="shortcut icon" href="<?= URL ?>public/favicon.ico" type="image/x-icon">
    <!-- appelle du fichier CSS -->
    <link rel="stylesheet" href="<?= URL ?>public/css/default.css">
    
    <!-- font awesome librairie d'icone 
        icone dispo : https://fontawesome.com/icons
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Si l'on rajouter des fichiers css spécifique pour une page avec le maincontroller  -->
    <?php if (!empty($page_css)) : ?>
        <?php foreach ($page_css as $fichier_css) : ?>
            <link href="<?= URL ?>public/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- titre -->
    <title>FINTECH</title>


</head>