<form class="d_flex flex_column mt_30" action="<?= URL ?>user/projet/registerProjet" method="POST">
    
        <div class="d_flex flex flex_column">
            <label for="nom_projet">Nom du projet :*</label>
            <input type="text" name="nom_projet" id="nom_projet" required>
        </div>
            
        
        <div class="d_flex flex flex_column">
            <label for="description_projet">Description :</label>
            <input type="text" name="description_projet" id="description_projet">
        </div>
       
        <div class="d_flex flex flex_column">
            <label for="invest_projet">investissement :*</label>
            <input type="number" name="invest_projet" id="invest_projet" required>
        </div>

        <div class="d_flex flex flex_column">
            <label for="duree_projet">Durée :*</label>
            <input type="number" name="duree_projet" id="duree_projet" required>
        </div>
        
    
    <button type="submit" class="btn btn_project mt_30 align_items_center">Crée</button>

</form>