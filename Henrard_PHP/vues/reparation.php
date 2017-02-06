<div class="container">
    <div class="row">
        <form method="get" action="?page=vehicle&id=<?php echo $r['vehicule_FK'];?>">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Retour à la voiture</button>
            </div>
        </form>
    </div>

    <div class="col-md-5 row">
        <form method="post" action="#">
            <fieldset disabled>
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" id="id" name="id" value="<?php echo $r['id'];?>" class="form-control" />
                </div>
            </fieldset>

            <div class="form-group">
                <label for="intervention">Intervention</label>
                <input type="text" id="intervention" name="intervention" value="<?php echo $r['intervention'];?>" class="form-control" />
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="5" id="description" name="description" class="form-control"><?php echo $r['description'];?></textarea>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="<?php echo $r['date'];?>" class="form-control" />
            </div>
            
            <input type="text" name="vehicule_FK" value="<?php echo $r['vehicule_FK'];?>" hidden="true"/>

            <!--fieldset disabled-->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            <!--/fieldset-->
        </form>
    </div>
</div>