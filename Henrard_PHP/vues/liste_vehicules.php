<div class="container well">
    
    <!--Encart de recherche de véhicule-->
    <!--Va rechercher dans toutes les colonnes de la DB-->
    <div class="row col-md-10" style="margin-bottom: 30px;">
        <form method="post" action="?page=list" class="form-inline">
            <div class="form-group">
                <input type="text" id="searchfield" name="search" placeholder="Rechercher par mot-clef" class="form-control" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form>
    </div>

    <!--Affichage en boucle de tous les véhicules-->
    <div class="row col-md-10">
        <ul class="list-group">
            <?php
                foreach ($vehicles as $v) {
                    if (isset($v['plaque']) && isset($v['id'])) {
                        include './vues/list_items/list_item_vehicule.php';
                    }
                    else{
                        echo '<li class="list-group-item"><strong>'.$v.'</strong></li>';
                    }
                }
            ?>
            
            <!--Bouton d'ajout d'un nouveau véhicule-->
            <li class="list-group-item">
                <form method="get" action="" class="form-inline">
                    <input type="hidden" name="page" value="vehicule" />
                    <input type="hidden" name="act" value="new" />
                    <button type="submit" class="btn btn-primary" <?php echo $input_disabled;?>>
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
