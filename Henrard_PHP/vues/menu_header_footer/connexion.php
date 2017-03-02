<!--Encart de connexion-->
<div id="navbar" class="navbar-collapse collapse">
    <form method="post" action="?act=connexion" class="navbar-form navbar-right">
        <div class="form-group">
            <input type="text" placeholder="login" class="form-control" name="login" id="login" />
        </div>
      <div class="form-group">
          <input type="password" placeholder="Password" class="form-control" name='password' id="password" />
      </div>
        <button type="submit" class="btn btn-success" id="button_connexion"><span class="glyphicon glyphicon-log-in"> Connexion</span></button>
    </form>
</div>

<script type="text/javascript" src="./controleurs/scripts/connexion.js"></script>
