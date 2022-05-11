<form action="<?= URL ?>goConnexion" method="POST" class="d_flex align_items_center justify_content_center flex_column">
    <table>
        <tr>
            <td class="text_end">Email :*</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span id="error_email"></span></td>
        </tr>
        <tr>
            <td class="text_end">Mot de passe :*</td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td colspan="2" class="text_center"><span  id="error_password"></span></td>
        </tr>
    </table>
    <button type="submit" class="btn btn_success">Se connecter</button>
</form>