<li class='list-group-item'>
    <form method='post' action='?page=reparation' class='form-inline'>
        <label class='col form-label'><?php echo $r['description'];?></label>
        <input type="hidden" name='id' class='form-control' value="<?php echo $r['id'];?>">
        <input type="hidden" name='intervention' class='form-control' value="<?php echo $r['intervention'];?>">
        <input type="hidden" name='description' class='form-control' value="<?php echo $r['description'];?>">
        <input type="hidden" name='date' class='form-control' value="<?php echo $r['date'];?>">
        <input type="hidden" name='vehicule_FK' class='form-control' value="<?php echo $r['vehicule_FK'];?>">
        <button type='submit' class='col btn btn-info'>Modifier</button>
    </form>
</li>