<div class="container">
    <div class="row">
        <form method="get" action="?page=vehicle&id=<?php echo $post['vehicule_FK'];?>">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Retour à la voiture</button>
            </div>
        </form>
    </div>

    <div class="col-md-5 row">
        <form method="post" action="?page=<?php echo $actionrep;?>">
            <div class="form-group" hidden="true">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="<?php echo is_null($post['id']) ? "-1" : $post['id'];?>" class="form-control" />
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
            
            <input type="text" name="vehicule_FK" value="<?php echo $post['vehicule_FK'];?>" hidden="true"/>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>