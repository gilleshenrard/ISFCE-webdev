<header>
    
<?php if(isset($_SESSION["login"]) && isset($_SESSION["password"])){
        echo "<form method='POST' action='index.php'>";
            echo "<label>Bonjour, ".$_SESSION["login"]."!</label>";
            echo "<input name='choix' value='deco' hidden />";
            echo "<input type='submit' value='Déconnexion'/>";
        echo "</form>";
    }
    else{
        echo "<form method='POST' action='index.php'>";
            echo "<input type='text' placeholder='login' name='login' />";
            echo "<input type='text' placeholder='password' name='password' />";
            echo "<input type='submit' value='Login'/>";
        echo "</form>";
    }?>
    <h1>Le site de l'œnologie</h1>
</header>