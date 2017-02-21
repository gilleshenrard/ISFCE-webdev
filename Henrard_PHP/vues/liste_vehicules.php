<div class="container well">
    <div class="row col-md-10" style="margin-bottom: 30px;">
        <form method="post" action="?page=list" class="form-inline">
            <div class="form-group">
                <input type="text" id="search" name="search" placeholder="Rechercher par mot-clef" class="form-control" />
                <!--small class="form-text text-muted">Entrez un mot-clef (plaque, marque, modèle, ...)</small-->
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Chercher</button>
            </div>
        </form>
    </div>

    <div class="row col-md-10">
        <ul class="list-group">
            <?php
                foreach ($vehicles as $v) {
                    if (isset($v['plaque']) && isset($v['id'])) {
                        include './vues/list_item.php';
                    }
                    else{
                        echo '<li class="list-group-item"><strong>'.$v.'</strong></li>';
                    }
                }
            ?>
            <a href="?page=new" class="list-group-item">Ajouter un véhicule</a>
        </ul>
    </div>
</div>