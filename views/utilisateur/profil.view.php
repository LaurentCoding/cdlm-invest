<div class="d_flex flex_column justify_content_around align_items_center">
    <div>
        <table>
            <tr>
                <td colspan="2">
                    <img src="<?= URL ?><?= $profil['avatar'] ?>" alt="avatar" class="img_rounded_150 d_block m_auto">
                </td>
            </tr>
            <tr>
                <form action=" <?= URL ?>user/profil/avatar" method="POST" enctype="multipart/form-data">
                    <td>
                        <input type="file" name="avatar" id="avatar">
                    </td>
                    <td>
                        <button type="submit">Modifier</button>
                    </td>
                </form>
            </tr>
        </table>

    </div>
    <table>
        <tr>
            <td>Email :</td>
            <td colspan="3"><?= $profil['email'] ?></td>
        </tr>
        <tr>
            <!-- affichage nom -->
            <td>Nom :</td>
            <td><?= $profil['name'] ?></td>
            <td>Modifier</td>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/name" method="POST">
                <td><input type="text" name="name" id="name" value="<?= $profil['name'] ?>"></td>
                <td><button type="submit" class="btn btn_success">Valider</button></td>
            </form>
        </tr>
        <tr>
            <!-- afficher prenom -->
            <td>Prenom :</td>
            <td><?= $profil['surname'] ?></td>
            <td>Modifier</td>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/surname" method="POST">
                <td><input type="text" name="surname" id="surname" value="<?= $profil['surname'] ?>"></td>
                <td><button type="submit" class="btn btn_success">Valider</button></td>
            </form>
        </tr>
        <tr>
            <!-- afficher la company -->
            <td>Société :</td>
            <td><?= $profil['company'] ?></td>
            <td>modifier</td>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/company" method="POST">
                <td><input type="text" name="company" id="company" value="<?= $profil['company'] ?>"></td>
                <td><button type="submit" class="btn btn_success">Valider</button></td>
            </form>
        </tr>
    </table>
</div>