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
            <div class="form-group" hidden="true">
                <label for="id">ID</label>
                <input type="text" id="id_reparation" name="id" value="<?php echo $post['id'];?>" class="form-control" />
            </div>

            <div class="form-group">
                <label for="intervention">Intervention</label>
                <input type="text" id="intervention" name="intervention" value="<?php echo $post['intervention'];?>" class="form-control" />
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="5" id="description" name="description" class="form-control"><?php echo $post['description'];?></textarea>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="<?php echo $post['date'];?>" class="form-control" />
            </div>
            
            <input type="hidden" name="vehicule_FK" value="<?php echo is_null($post['vehicule_FK']) ? "-1" : $post['vehicule_FK'];?>" />

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-ok"> Valider</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!--Script jQuery spécialisé pour la validation front-end des réparations-->
<link type="text/javascript" href="./controleurs/scripts/reparation.js" />
