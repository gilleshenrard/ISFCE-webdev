<div class="container">
    <div class="container col-md-5">
        <form method="post" action="#">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="<?php echo $v['id'];?>" class="form-control" disabled="true" />
            </div>

            <div class="form-group">
                <label for="numero_chassis">Numéro de chassis</label>
                <input type="text" id="numero_chassis" name="numero_chassis" value="<?php echo $v['numero_chassis'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="plaque">Numéro de plaque</label>
                <input type="text" id="plaque" name="plaque" value="<?php echo $v['plaque'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="marque">Marque</label>
                <input type="text" id="marque" name="marque" value="<?php echo $v['marque'];?>" class="form-control" />
            </div>

            <div class="form-group">
                <label for="modele">Modèle</label>
                <input type="text" id="modele" name="modele" value="<?php echo $v['modele'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" value="<?php echo $v['type'];?>">
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
        <div class="list-group">
            <?php
                foreach ($rep as $r) {
                    if (isset($r['intervention']) && isset($r['id'])) {
                        echo '<a href="?page=reparation&id='.$r['id'].'" class="list-group-item">'.$r['intervention'].'</a>';
                    }
                }
            ?>
        </div>
    </div>
</div>