<div class="container well">
    <div class="row col-md-10" style="margin-bottom: 30px;">
        <form method="post" action="?page=list" class="form-inline">
            <div class="form-group">
                <input type="text" id="search" name="search" placeholder="Rechercher par mot-clef" class="form-control" />
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
                        include './vues/list_items/list_item_vehicule.php';
                    }
                    else{
                        echo '<li class="list-group-item"><strong>'.$v.'</strong></li>';
                    }
                }
            ?>
            <li class="list-group-item">
                <form method="get" action="" class="form-inline">
                    <input type="hidden" name="page" value="vehicule" />
                    <input type="hidden" name="act" value="new" />
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
