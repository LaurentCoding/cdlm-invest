<h1 class="connexion_titre">Connexion</h1>
<form class="connexion_form mt_20 p_30" action="<?= URL ?>goConnexion" method="POST" class="d_flex align_items_center justify_content_center flex_column">
    <table>
        <tr>
            <td class="form_name text_start">Email :*</td>
        </tr>
        <tr>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_email"></span></td>
        </tr>
        <tr>
            <td class="form_name text_start">Mot de passe :*</td>
        </tr>
        <tr>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span  id="error_password"></span></td>
        </tr>
    </table>
    <button type="submit" class="btn btn_valid mt_20" >Connection</button>
</form>