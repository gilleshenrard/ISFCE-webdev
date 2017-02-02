<div class="container">
    <div class="container col-md-5">
        <form method="post" action="#">
            <fieldset disabled>
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" id="id" name="id" value="<?php echo $_COOKIE['v_id'];?>" class="form-control" />
                </div>
            </fieldset>

            <div class="form-group">
                <label for="numero_chassis">Numéro de chassis</label>
                <input type="text" id="numero_chassis" name="numero_chassis" value="<?php echo $_COOKIE['v_ch'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="plaque">Numéro de plaque</label>
                <input type="text" id="plaque" name="plaque" value="<?php echo $_COOKIE['v_pl'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="marque">Marque</label>
                <input type="text" id="marque" name="marque" value="<?php echo $_COOKIE['v_ma'];?>" class="form-control" />
            </div>

            <div class="form-group">
                <label for="modele">Modèle</label>
                <input type="text" id="modele" name="modele" value="<?php echo $_COOKIE['v_mo'];?>" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="type">Type</label>
                <input type="text" id="type" name="type" value="<?php echo $_COOKIE['v_ty'];?>" class="form-control" />
            </div>

            <!--fieldset disabled-->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            <!--/fieldset-->
        </form>
    </div>

    <div class="container col-md-2"></div>

    <div class="container col-md-5">
        <h1>Réparations</h1>
        <div class="list-group">
            <?php
                foreach ($rep as $r) {
                    if (isset($r['intervention']) && isset($r['id'])) {
                        print '<a href="?page=reparation&id='.$r['id'].'" class="list-group-item">'.$r['intervention'].'</a>';
                    }
                }
            ?>
        </div>
    </div>
</div>