CREATE TABLE `user`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `surname` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `company` VARCHAR(255) NOT NULL,
    `is_admin` INT(1) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `avatar` VARCHAR(255) NOT NULL
);
CREATE TABLE `taux`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titre_taux` VARCHAR(255) NOT NULL,
    `value_taux` DOUBLE(8, 2) NOT NULL
);
CREATE TABLE `emprunt`(
    `annee_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `emprunt_titre` VARCHAR(255) NOT NULL,
    `emprunt_sum` DOUBLE(8, 2) NOT NULL
);
ALTER TABLE
    `emprunt` ADD INDEX `emprunt_annee_id_index`(`annee_id`);
CREATE TABLE `projet`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `nom_projet` VARCHAR(255) NOT NULL,
    `description_projet` VARCHAR(255) NOT NULL,
    `investissement` VARCHAR(100) NOT NULL,
    `duree` INT NOT NULL
);
ALTER TABLE
    `projet` ADD INDEX `projet_user_id_index`(`user_id`);
CREATE TABLE `annee`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `projet_id` INT NOT NULL,
    `name_annee` VARCHAR(255) NOT NULL
);
CREATE TABLE `ChiffreAffaires`(
    `annee_id` INT NOT NULL,
    `value_chiffre_affaires` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `ChiffreAffaires` ADD INDEX `chiffreaffaires_annee_id_index`(`annee_id`);
CREATE TABLE `chargesStructures`(
    `annee_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `value_charge_structure` DOUBLE(8, 2) NOT NULL
);
ALTER TABLE
    `chargesStructures` ADD INDEX `chargesstructures_annee_id_index`(`annee_id`);
CREATE TABLE `Amortissements`(
    `annee_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `value_amortissement` INT NOT NULL
);
ALTER TABLE
    `Amortissements` ADD INDEX `amortissements_annee_id_index`(`annee_id`);
ALTER TABLE
    `projet` ADD CONSTRAINT `projet_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `annee` ADD CONSTRAINT `annee_projet_id_foreign` FOREIGN KEY(`projet_id`) REFERENCES `projet`(`id`);
ALTER TABLE
    `emprunt` ADD CONSTRAINT `emprunt_annee_id_foreign` FOREIGN KEY(`annee_id`) REFERENCES `annee`(`id`);
ALTER TABLE
    `ChiffreAffaires` ADD CONSTRAINT `chiffreaffaires_annee_id_foreign` FOREIGN KEY(`annee_id`) REFERENCES `annee`(`id`);
ALTER TABLE
    `chargesStructures` ADD CONSTRAINT `chargesstructures_annee_id_foreign` FOREIGN KEY(`annee_id`) REFERENCES `annee`(`id`);
ALTER TABLE
    `Amortissements` ADD CONSTRAINT `amortissements_annee_id_foreign` FOREIGN KEY(`annee_id`) REFERENCES `annee`(`id`);
