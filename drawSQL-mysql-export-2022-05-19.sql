CREATE TABLE `user`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `surname` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `company` VARCHAR(255) NOT NULL,
    `is_admin` INT NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `avatar` VARCHAR(255) NOT NULL,
    `grade_id` INT NOT NULL
);
CREATE TABLE `taux`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titre_taux` VARCHAR(255) NOT NULL,
    `value_taux` DOUBLE(8, 2) NOT NULL
);
CREATE TABLE `projet`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `nom_projet` VARCHAR(255) NOT NULL,
    `description_projet` VARCHAR(255) NOT NULL,
    `investissement` VARCHAR(255) NOT NULL,
    `duree` INT NOT NULL
);
CREATE TABLE `annee`(
    `projet_id` INT NOT NULL,
    `name_annee` VARCHAR(100) NOT NULL,
    `chiffre_affaire` VARCHAR(50) NOT NULL,
    `achats_annuels` VARCHAR(50) NOT NULL,
    `charges_structures` VARCHAR(50) NOT NULL,
    `amortissements` VARCHAR(50) NOT NULL,
    `augmentation_bfr` VARCHAR(50) NOT NULL,
    `valeur_residuelle_nette_is` VARCHAR(50) NOT NULL
);
CREATE TABLE `blog`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name_blog` VARCHAR(70) NOT NULL,
    `description_blog` VARCHAR(255) NOT NULL,
    `create_blog` DATE NOT NULL,
    `image_blog` VARCHAR(150) NOT NULL
);
CREATE TABLE `grade`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name_profil` VARCHAR(60) NOT NULL
);
INSERT INTO `grade`(`name_profil`) VALUES ('Recruteur'),('Etudiant'),('Professionel'),('Expert financier')