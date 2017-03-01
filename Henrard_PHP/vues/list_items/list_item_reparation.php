<li class='list-group-item'>
    <div class="container-fluid list_item_reparation">
        <form method='post' action='?page=reparation&act=edit' class='form-inline'>
            <label class='col form-label col-md-9'><?php echo $display;?></label>
            <input type="hidden" name='id' class='form-control' value="<?php echo $r['id'];?>">
            <input type="hidden" name='intervention' class='form-control' value="<?php echo $r['intervention'];?>">
            <input type="hidden" name='description' class='form-control' value="<?php echo $r['description'];?>">
            <input type="hidden" name='date' class='form-control' value="<?php echo $r['date'];?>">
            <input type="hidden" name='vehicule_FK' class='form-control' value="<?php echo $r['vehicule_FK'];?>">
            <div class="btn-group col pull-right">
                <button type='submit' class='col btn btn-info'>
                    <span class="glyphicon glyphicon-eye-open"></span>
                </button>
                
                <!--Bouton de suppression : input simple au lieu d'un submit-->
                <button type="text" class="btn btn-danger" name="del" value="true">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </div>
        </form>
    </div>
</li>