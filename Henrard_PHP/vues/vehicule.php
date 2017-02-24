<div class="container">
    <div class="container col-md-5">
        <form method="post" action="?page=<?php echo $action?>">
            <div class="form-group" hidden="true">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="<?php echo is_null($post['id']) ? "-1" : $post['id'];?>" class="form-control" />
            </div>

            <div class="form-group">
                <label for="numero_chassis">Numéro de chassis</label>
                <input type="text" id="numero_chassis" name="numero_chassis" value="<?php echo $post['numero_chassis'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="plaque">Numéro de plaque</label>
                <input type="text" id="plaque" name="plaque" value="<?php echo $post['plaque'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="marque">Marque</label>
                <input type="text" id="marque" name="marque" value="<?php echo $post['marque'];?>" class="form-control" />
            </div>

            <div class="form-group">
                <label for="modele">Modèle</label>
                <input type="text" id="modele" name="modele" value="<?php echo $post['modele'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" value="<?php echo $post['type'];?>">
                    <option>Voiture</option>
                    <option>Moto</option>
                    <option>Camion</option>
                    <option>Camionette</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>

    <div class="container col-md-2"></div>

    <div class="container col-md-5">
        <h1>Réparations</h1>
        <ul class="list-group">
            <?php
                foreach ($rep as $r) {
                    if (isset($r['intervention']) && isset($r['id'])) {
                        include './controleurs/controleur_list_item_reparation.php';
                    }
                }
            ?>
            <a href="?page=new-reparation" class="list-group-item">Ajouter une réparation</a>
        </ul>
    </div>
</div>