<div class="container">
    <!--Formulaire d'affichage/édition de véhicule-->
    <div class="container col-md-5">
        <form method="post" action="?page=vehicule&act=<?php echo $act;?>">

            <input type="hidden" id="id_vehicule" name="id" value="<?php echo $post['id'];?>" class="form-control" />

            <div class="form-group has-feedback" id='group_chassis'>
                <label for="input_chassis">Numéro de chassis</label>
                <input type="text" id="input_chassis" name="numero_chassis" value="<?php echo $post['numero_chassis'];?>" class="form-control" placeholder="12345-12345-12345-12345" />
				<span class="glyphicon form-control-feedback" id="fb_chassis"></span>
                <span id="tip_chassis" class="help-block small hidden">Le numéro de chassis doit ressembler à : 12345-12345-12345-12345</span>
            </div>

            <div class="form-group has-feedback" id='group_plaque'>    
                <label for="input_plaque">Numéro de plaque</label>
                <input type="text" id="input_plaque" name="plaque" value="<?php echo $post['plaque'];?>" class="form-control" placeholder="(1-)ABC-123" />
				<span class="glyphicon form-control-feedback" id="fb_plaque"></span>
                <span id="tip_plaque" class="help-block small hidden">Le numéro de plaque doit ressembler à : (1-)ABC-123</span>
            </div>

            <div class="form-group has-feedback" id="group_marque">    
                <label for="input_marque">Marque</label>
                <input type="text" id="input_marque" name="marque" value="<?php echo $post['marque'];?>" class="form-control" placeholder="Marque" />
				<span class="glyphicon form-control-feedback" id="fb_marque"></span>
                <span id="tip_marque" class="help-block small hidden">Le modèle ne peut contenir que des caractères alphanumériques et les espaces</span>
            </div>

            <div class="form-group has-feedback" id="group_modele">
                <label for="input_modele">Modèle</label>
                <input type="text" id="input_modele" name="modele" value="<?php echo $post['modele'];?>" class="form-control" placeholder="Modèle" />
				<span class="glyphicon form-control-feedback" id="fb_modele"></span>
                <span id="tip_modele" class="help-block small hidden">Le modèle ne peut contenir que des caractères alphanumériques et les espaces</span>
            </div>

            <div class="form-group">    
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" value="<?php echo $post['type'];?>">
                    <?php foreach ($types_options as $value) {
                        echo $value;
                    }?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="validate_vehicule" <?php echo $input_disabled;?>>
                    <span class="glyphicon glyphicon-ok"> Valider</span>
                </button>
            </div>
        </form>
    </div>

    <!--Espaçage des deux tableaux-->
    <div class="container col-md-2"></div>

    <!---listage des réparations liées au véhicule-->
    <div class="container col-md-5">
        <h1>Réparations</h1>

        <!--Affichage en boucle de toutes les réparations-->
        <ul class="list-group">
            <?php foreach ($rep as $r) {
                include './controleurs/controleur_list_item_reparation.php';
            }?>

            <!--Bouton d'ajout de nouvelle réparation liée au véhicule-->
            <div class="list-group-item">
                <form method="post" action="?page=reparation&act=new" class="form-inline">
                    <input type="hidden" name="vehicule_FK" value="<?php echo $post['id'];?>" />
                    <button type="submit" class="btn btn-primary" <?php echo $input_disabled;?>>
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </form>
            </div>
        </ul>
    </div>
</div>
