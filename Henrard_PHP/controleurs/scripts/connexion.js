$(document).ready(function () {
    /**
     * Vérifie si les champs login et password sont vides
     */
    $("#button_connexion").click(function () {
        if (!$("#login").val() || !$("#password").val()) {
            alert("Valeurs de connexion incorrectes");
            return false;
        }
        return true;
    });
});
