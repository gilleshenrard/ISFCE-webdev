<li class='list-group-item'>
    <form method='post' action='?page=vehicle' class='form-inline'>
        <label name='plaque' class='col-md-4 form-label'><?php echo $v['plaque'];?></label>
        <label name='marque' class='col-md-3 form-label'><?php echo $v['marque'];?></label>
        <label name='modele' class='col-md-3 form-label'><?php echo $v['modele'];?></label>
        <input type="hidden" name='id' class='form-control' value="<?php echo $v['id'];?>">
        <input type="hidden" name='numero_chassis' class='form-control' value="<?php echo $v['numero_chassis'];?>">
        <input type="hidden" name='plaque' class='form-control' value="<?php echo $v['plaque'];?>">
        <input type="hidden" name='marque' class='form-control' value="<?php echo $v['marque'];?>">
        <input type="hidden" name='modele' class='form-control' value="<?php echo $v['modele'];?>">
        <input type="hidden" name='type' class='form-control' value="<?php echo $v['type'];?>">
        <button type='submit' class='col btn btn-info'>Modifier</button>
    </form>
</li>