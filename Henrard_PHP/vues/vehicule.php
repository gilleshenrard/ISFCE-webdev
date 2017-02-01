<div class="container">
    <div class="container col-md-5">
        <form method="post" action="#">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="1" class="form-control" />
            </div>

            <div class="form-group">
                <label for="numero_chassis">Numéro de chassis</label>
                <input type="text" id="numero_chassis" name="numero_chassis" value="12321-32123-11223-33221" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="plaque">Numéro de plaque</label>
                <input type="text" id="plaque" name="plaque" value="1-DHF-753" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="marque">Marque</label>
                <input type="text" id="marque" name="marque" value="Peugeot" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="modele">Modèle</label>
                <input type="text" id="modele" name="modele" value="308" class="form-control" />
            </div>

            <div class="form-group">    
                <label for="type">Type</label>
                <input type="text" id="type" name="type" value="Voiture" class="form-control" />
            </div>

            <fieldset disabled>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="container col-md-2"></div>

    <div class="container col-md-5">
        <h1>Réparations</h1>
        <div class="list-group">
            <a href="?page=reparation&id=1" class="list-group-item">rep1</a>
            <a href="?page=reparation&id=2" class="list-group-item">rep2</a>
            <a href="?page=reparation&id=3" class="list-group-item">rep3</a>
        </div>
    </div>
</div>