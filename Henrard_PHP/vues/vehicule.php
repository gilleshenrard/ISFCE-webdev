<div class="container">
    <div class="container col-md-5">
        <form method="post" action="?page=vehicule&act=<?php echo $act;?>">

            <input type="hidden" id="id" name="id" value="<?php echo $post['id'];?>" class="form-control" />

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
                <button type="submit" class="btn btn-primary">Valider</button>
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
            <div class="list-group-item">
                <form method="post" action="?page=reparation&act=new" class="form-inline">
                    <input type="hidden" name="vehicule_FK" value="<?php echo $post['id'];?>" />
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </form>
            </div>
        </ul>
    </div>
</div>
