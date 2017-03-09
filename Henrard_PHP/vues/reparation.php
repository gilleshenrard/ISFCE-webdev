<div class="container">
    <!--Bouton de retour au véhicule auquel la réparation est liée-->
    <div class="row">
        <form method="post" action="?page=vehicule&act=search">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $post['vehicule_FK'];?>" />
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-arrow-left"> Véhicule</span>
                </button>
            </div>
        </form>
    </div>

    <!--Formulaire d'affichage/édition de réparation-->
    <div class="col-md-5 row">
        <form method="post" action="?page=reparation&act=<?php echo $act;?>">
            <input type="hidden" id="id_reparation" name="id" value="<?php echo $post['id'];?>" class="form-control" />

            <div class="form-group" id='group_intervention'>
                <label for="input_intervention">Intervention</label>
                <input type="text" id="input_intervention" name="intervention" value="<?php echo $post['intervention'];?>" class="form-control" />
                <span id="tip_intervention" class="help-block small tips hidden" hidden="true">L'intitulé de l'intervention doit être alphanumérique</span>
            </div>

            <div class="form-group">
                <label for="input_description">Description</label>
                <textarea rows="5" id="input_description" name="description" class="form-control"><?php echo $post['description'];?></textarea>
            </div>

            <div class="form-group" id='group_date'>
                <label for="input_date">Date</label>
                <input type="date" id="input_date" name="date" value="<?php echo $post['date'];?>" class="form-control" />
                <span id="tip_date" class="help-block small tips hidden" hidden="true">La date doit être alphanumérique</span>
            </div>
            
            <input type="hidden" name="vehicule_FK" value="<?php echo $post['vehicule_FK'];?>" />

            <div class="form-group">
                <button type="submit" class="btn btn-primary" <?php echo $input_disabled;?>>
                    <span class="glyphicon glyphicon-ok"> Valider</span>
                </button>
            </div>
        </form>
    </div>
</div>
