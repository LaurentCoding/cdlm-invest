<form action="<?= URL ?>user/projet/registerProjet" method="POST">
    <table>
        <tr>
            <td>Nom du projet :*</td>
            <td><input type="text" name="nom_projet" id="nom_projet" required></td>
        </tr>
        <tr>
            <td>Description :</td>
            <td><input type="text" name="description_projet" id="description_projet"></td>
        </tr>
        <tr>
            <td>investissement :*</td>
            <td><input type="number" name="invest_projet" id="invest_projet" required></td>
        </tr>
        <tr>
            <td>Durée :*</td>
            <td><input type="number" name="duree_projet" id="duree_projet" required></td>
        </tr>
    </table>
    <button type="submit" class="btn btn_secondary">Crée</button>

</form>