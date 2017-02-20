<div class="container">
    <div class="row" style="margin-bottom: 30px;">
        <form method="post" action="#" class="form-inline">
            <div class="form-group">
                <input type="text" id="search" name="search" placeholder="Rechercher par mot-clef" class="form-control" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Chercher</button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="list-group">
            <?php
                foreach ($vehicles as $v) {
                    //var_dump($v);
                    if (isset($v['plaque']) && isset($v['id'])) {
                        echo '<a href="?page=vehicle&id='.$v['id'].'" class="list-group-item">'.$v['plaque'].'</a>';
                    }
                    else{
                        echo '<strong>'.$v.'</strong>';
                    }
                }
            ?>
        </div>
    </div>
</div>