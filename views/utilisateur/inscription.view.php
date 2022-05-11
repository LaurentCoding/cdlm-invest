<!-- affichage formulaire -->
<form method="POST" action="goInscription" class="d_flex align_items_center justify_content_center flex_column">
    <table>
        <tr>
            <td class="text_end">Nom :*</td>
            <td><input type="text" name="nom" id="nom" value="<?= $nom ?? "" ?>"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_nom"></span></td>
        </tr>
        <tr>
            <td class="text_end">Prenom :*</td>
            <td><input type="text" name="prenom" id="prenom" value="<?= $prenom ?? "" ?>"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_prenom"></span></td>
        </tr>
        <tr>
            <td class="text_end">Email :*</td>
            <td><input type="email" name="email" id="email" value="<?= $email ?? "" ?>"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_email"></span></td>
        </tr>
        <tr>
            <td class="text_end">Mot de passe :*</td>
            <td><input type="password" name="password1" id="password1"></td>
        </tr>
        <tr>
            <td class="text_end">Confirmation mot de passe :*</td>
            <td><input type="password" name="password2" id="password2"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_password"></span></td>
        </tr>
    </table>
    <button type="submit">S'inscrire</button>
</form>
<?php if (isset($_SESSION['inscription'])) { ?>
    <div>Votre Compte à bien été enregistré. <a href="<?= URL ?>connexion">Se connecter</a></div>

<?php
    unset($_SESSION['inscription']);
}
?>