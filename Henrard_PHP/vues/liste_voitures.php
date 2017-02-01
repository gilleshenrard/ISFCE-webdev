<div class="container">
    <form method="post" action="#" class="form-inline">
        <div class="form-group">
            <input type="text" id="plaque" name="plaque" placeholder="Plaque à chercher" class="form-control" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</div>

<div class="container">
    <div class="list-group">
        <!--a href="?page=vehicle&id=1" class="list-group-item">Car1</a-->
        <?php
            include './controleurs/controleur_vehicules.php';
            $vehicles = make_list();
            foreach ($vehicles as $v) {
                print '<a href="?page=vehicle&id=1" class="list-group-item">'.$v['plaque'].'</a>';
            }
        ?>
    </div>
</div>