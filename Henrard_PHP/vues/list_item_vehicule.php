<li class='list-group-item'>
    <div class="container-fluid">
        <form method='post' action='?page=vehicule&act=edit' class='form-inline col-md-10'>
            <label name='plaque' class='col-md-4 form-label'><?php echo $v['plaque'];?></label>
            <label name='marque' class='col-md-3 form-label'><?php echo $v['marque'];?></label>
            <label name='modele' class='col-md-3 form-label'><?php echo $v['modele'];?></label>
            <input type="hidden" name='id' class='form-control' value="<?php echo $v['id'];?>">
            <input type="hidden" name='numero_chassis' class='form-control' value="<?php echo $v['numero_chassis'];?>">
            <input type="hidden" name='plaque' class='form-control' value="<?php echo $v['plaque'];?>">
            <input type="hidden" name='marque' class='form-control' value="<?php echo $v['marque'];?>">
            <input type="hidden" name='modele' class='form-control' value="<?php echo $v['modele'];?>">
            <input type="hidden" name='type' class='form-control' value="<?php echo $v['type'];?>">
            <div class="btn-group pull-right col">
                <button type='submit' class='btn btn-info'>
                    <span class="glyphicon glyphicon-eye-open"></span>
                </button>
                <button type="text" class="btn btn-danger" name="del" value="true">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </div>
        </form>
    </div>
</li>
