<script type="text/javascript">
    //Affichage du message d'erreur renvoyé par l'exception (formaté en JSON)
    alert("ERREUR : "+<?php echo json_encode($e->getMessage());?>);

    //redirection vers la page d'accueil
    window.location.href =  window.location.href.split("?")[0];
</script>