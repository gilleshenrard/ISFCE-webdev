<li class='list-group-item'>
    <div class="container-fluid list_item_reparation">
        <form method='post' action='?page=reparation&act=edit' class='form-inline'>
            <!--Affiche l'output généré dans le controleur de list item réparation-->
            <label class='col form-label col-md-9'><?php echo $display;?></label>
 
            <!--Série d'inputs cachés pour forcer la valeur de $_POST-->
            <input type="hidden" name='id' value="<?php echo $r['id'];?>">
            <input type="hidden" name='intervention' value="<?php echo $r['intervention'];?>">
            <input type="hidden" name='description' value="<?php echo $r['description'];?>">
            <input type="hidden" name='date' value="<?php echo $r['date'];?>">
            <input type="hidden" name='vehicule_FK' value="<?php echo $r['vehicule_FK'];?>">

            
            <div class="btn-group col pull-right">
                <!--Bouton de validation : type -> submit-->
                <button type='submit' class='col btn btn-info'>
                    <span class="glyphicon glyphicon-eye-open"></span>
                </button>
                
                <!--Bouton de suppression : input simple au lieu d'un submit-->
                <button type="text" class="btn btn-danger" name="del" value="true" <?php echo $input_disabled;?>>
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </div>
        </form>
    </div>
</li>
