<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        
        <!--Bouton home (efface les headers GET)-->
        <div class="navbar-header">
            <a class="navbar-brand" href="./">Gilles Henrard</a>
        </div>
        
        <!--Barre de navigation (liens, ajoutent un header GET 'page')-->
        <ul class="nav navbar-nav">
            <li><a href="?page=list_car">Véhicules</a></li>
        </ul>
        
        <!--Encart de connexion-->
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control" />
                </div>
              <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" />
              </div>
              <button type="submit" class="btn btn-success">Connexion</button>
            </form>
        </div>
    </div>
</nav>