<div class="container">
    <div class="container col-md-5">
        <form method="post" action="?page=vehicule&act=<?php echo $act;?>">

            <input type="hidden" id="id_vehicule" name="id" value="<?php echo $post['id'];?>" class="form-control" />

            <div class="form-group" id='group_chassis'>
                <label for="numero_chassis">Numéro de chassis</label>
                <input type="text" id="numero_chassis" name="numero_chassis" value="<?php echo $post['numero_chassis'];?>" class="form-control" />
                <span id="tip_chassis" class="help-block small tips" hidden="true">Le numéro de chassis doit ressembler à : 12345-12345-12345-12345</span>
            </div>

            <div class="form-group" id='group_plaque'>    
                <label for="plaque">Numéro de plaque</label>
                <input type="text" id="plaque" name="plaque" value="<?php echo $post['plaque'];?>" class="form-control" />
                <span id="tip_plaque" class="help-block small tips" hidden="true">Le numéro de plaque doit ressembler à : (1-)ABC-123</span>
            </div>

            <div class="form-group group_marque">    
                <label for="marque">Marque</label>
                <input type="text" id="marque" name="marque" value="<?php echo $post['marque'];?>" class="form-control" />
                <span id="tip_marque" class="help-block small tips" hidden="true">Le modèle ne peut contenir que des caractères alphanumériques</span>
            </div>

            <div class="form-group group_modele">
                <label for="modele">Modèle</label>
                <input type="text" id="modele" name="modele" value="<?php echo $post['modele'];?>" class="form-control" />
                <span id="tip_modele" class="help-block small tips" hidden="true">Le modèle ne peut contenir que des caractères alphanumériques</span>
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
                <button type="submit" class="btn btn-primary" id="validate_vehicule">
                    <span class="glyphicon glyphicon-ok"> Valider</span>
                </button>
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

<script src='controleurs/scripts/vehicule.js' type='text/javascript'></script>
