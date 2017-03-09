<!--Encart de connexion-->
<div id="navbar" class="navbar-collapse collapse">
    <form method="get" action="" class="navbar-form navbar-right">
        <input type="hidden" name="act" value="deconnexion" />
        
        <div class="form-group">
            <label class="form-label" style="color: white; padding-right: 20px">Bonjour, <?php echo $_SESSION['login'];?></label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Déconnexion</button>
        </div>
    </form>
</div>
