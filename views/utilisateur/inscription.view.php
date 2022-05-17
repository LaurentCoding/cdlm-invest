<!-- affichage formulaire -->

<h1 class="inscription_titre">Créer un compte</h1>
<form class="inscription_form mt_20" method="POST" action="goInscription" class="d_flex align_items_center justify_content_center flex_column">
    <table>
        <tr>
            <td class="form_name text_start mt_10">Nom :*</td>
        </tr>
        <tr>
            <td><input type="text" name="nom" id="nom" value="<?= $nom ?? "" ?>"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_nom"></span></td>
        </tr>
        <tr>
            <td class="form_name text_start mt_10">Prenom :*</td>
        </tr>
        <tr>
            <td><input type="text" name="prenom" id="prenom" value="<?= $prenom ?? "" ?>"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_prenom"></span></td>
        </tr>
        <tr>
            <td class="form_name text_start mt_10">Email :*</td>
        </tr>
        <tr>
            <td><input type="email" name="email" id="email" value="<?= $email ?? "" ?>"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_email"></span></td>
        </tr>
        <tr>
            <td class="form_name text_start mt_10">Mot de passe :*</td>
        </tr>
        <tr>
            <td><input type="password" name="password1" id="password1"></td>
        </tr>
        <tr>
            <td class="form_name text_start mt_10">Confirmation mot de passe :*</td>
        </tr>
        <tr>
            <td><input type="password" name="password2" id="password2"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_password"></span></td>
        </tr>
    </table>
    <div>
        <button class="btn btn_valid mt_20" type="submit">S'inscrire</button>
    </div>
</form>

<?php if (isset($_SESSION['inscription'])) { ?>
    <div>Votre Compte à bien été enregistré. <a href="<?= URL ?>connexion">Se connecter</a></div>

<?php
    unset($_SESSION['inscription']);
}
?>