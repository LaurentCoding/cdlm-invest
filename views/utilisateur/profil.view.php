<div class="d_flex flex_column  align_items_center">
    <div>
        <table>
            <tr>
                <td colspan="2">
                    <img src="<?= URL ?><?= $profil->getAvatar() ?>" alt="avatar" class="img_rounded_150 d_block m_auto">
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
    <table class="table_profil mt_30 container">
        <tr>
            <td>Email :</td>
            <td colspan="4"><?= $profil->getEmail() ?></td>
        </tr>
        <tr>
            <!-- affichage nom -->
            <td>Nom :</td>
            <td><?= $profil->getName() ?></td>
            <td>Modifier</td>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/name" method="POST">
                <td><input type="text" name="name" id="name" value="<?= $profil->getName() ?>"></td>
                <td><button type="submit" class="btn btn_valider">Valider</button></td>
            </form>
        </tr>
        <tr>
            <!-- afficher prenom -->
            <td>Prenom :</td>
            <td><?= $profil->getSurname() ?></td>
            <td>Modifier</td>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/surname" method="POST">
                <td><input type="text" name="surname" id="surname" value="<?= $profil->getSurname() ?>"></td>
                <td><button type="submit" class="btn btn_valider">Valider</button></td>
            </form>
        </tr>
        <tr>
            <!-- afficher la company -->
            <td>Société :</td>
            <td><?= $profil->getCompany() ?></td>
            <td>Modifier</td>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/company" method="POST">
                <td><input type="text" name="company" id="company" value="<?= $profil->getCompany() ?>"></td>
                <td><button type="submit" class="btn btn_valider">Valider</button></td>
            </form>
        </tr>
        <tr>
            <td colspan="5">
                <form action="<?= URL ?>user/profil/grade_id" method="POST">
                    <select name="grade" id="grade">
                        <?php foreach ($allGrade as $grade) : ?>
                            <option value="<?= $grade['id'] ?>" <?php if($grade['id'] == $gradeSelect[0]['id']){ ?> selected <?php } ?>><?= $grade['name_profil'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="submit">Modifier</button>
                </form>
            </td>
        </tr>
    </table>
</div>
