<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Astronomie</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <?php include './includes/header.php';?>
    <body>
        <?php include './includes/menu.php';?>
        <h1>Enregistrer une nouvelle planète</h1>
        <form method="get" action="page5_reception.php">
            <label for="name">Name</label>
            <input type="text" id="name" name="name"/>
            <label for="description">Description</label>
            <textarea name="description" id="description" />
            <input type="submit" value="Submit" />
        </form>
    </body>
    <?php include './includes/footer.php';?>
</html>