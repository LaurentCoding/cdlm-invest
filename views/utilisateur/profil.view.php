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
            <td class="text_end p_5">Email :</td>
            <td class="text_center"><?= $profil->getEmail() ?></td>
            <td></td>
        </tr>
        <tr>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/name" method="POST">
                <td class="text_end">Nom :</td>
                <td><input type="text" name="name" id="name" value="<?= $profil->getName() ?>"></td>
                <td class="text_center"><button type="submit" class="btn btn_valider"><i class="fa-solid fa-pen"></i></button></td>
            </form>
        </tr>
        <tr>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <form action="<?= URL ?>user/profil/surname" method="POST">
                <td class="text_end p_5">Prenom :</td>
                <td><input type="text" name="surname" id="surname" value="<?= $profil->getSurname() ?>"></td>
                <td class="text_center"><button type="submit" class="btn btn_valider"><i class="fa-solid fa-pen"></i></button></td>
            </form>
        </tr>
        <tr>
            <!-- a gèrer avec le JS pour affichier si on clic sur modifier -->
            <td class="text_end p_5">Société :</td>
            <form action="<?= URL ?>user/profil/company" method="POST">
                <td><input type="text" name="company" id="company" value="<?= $profil->getCompany() ?>"></td>
                <td class="text_center"><button type="submit" class="btn btn_valider"><i class="fa-solid fa-pen"></i></button></td>
            </form>
        </tr>
        <tr>>
            <form action="<?= URL ?>user/profil/grade_id" method="POST">
                <td class="text_end">Grade :</td>
                <td>
                    <select name="grade" id="grade" class="w_100">
                        <?php foreach ($allGrade as $grade) : ?>
                            <option value="<?= $grade['id'] ?>" <?php if ($grade['id'] == $gradeSelect[0]['id']) { ?> selected <?php } ?>><?= $grade['name_profil'] ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td class="text_center">
                    <button class="btn btn_valider" type="submit"><i class="fa-solid fa-pen"></i></button>
                </td>
            </form>
        </tr>
    </table>
</div>