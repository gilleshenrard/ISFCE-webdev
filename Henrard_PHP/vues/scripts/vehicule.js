/**
 * Compare le regex envoyé à la valeur de ID, et impacte le form-group et le tip en conséquence
 * @param {string} regex
 * @param {string} id
 */
function checkValues(regex, id){
    if (regex.test($("#input_"+id).val())) {
        $("#group_"+id).removeClass("has-error");
        $("#group_"+id).addClass("has-success");
        $("#fb_"+id).removeClass("glyphicon-remove");
        $("#fb_"+id).addClass("glyphicon-ok");
        $("#tip_"+id).addClass("hidden");
        $("#validate_vehicule").prop("disabled",false);
    } else {
        $("#group_"+id).removeClass("has-success");
        $("#group_"+id).addClass("has-error");
        $("#fb_"+id).removeClass("glyphicon-ok");
        $("#fb_"+id).addClass("glyphicon-remove");
        $("#tip_"+id).removeClass("hidden");
        $("#validate_vehicule").prop("disabled",true);
    }
}

$(document).ready(function() {
    /**
     * Valide la valeur du numéro de chassis
     * Structure : 12345-12345-12345-12345
     */
    $("#input_chassis").focusout(function(){
        checkValues(/^([0-9]{5}-){3}[0-9]{5}$/, "chassis");
    });
        
    /**
     * Valide la valeur du numéro de plaque
     * Structure : [1-]ABC-123 ou [1-]abc-123
     */
    $("#input_plaque").focusout(function(){
        checkValues(/^(1-)?[a-zA-Z]{3}-[0-9]{3}$/, "plaque");
    });
    
    /**
     * Valide la valeur de la marque
     * Structure : n'accepte que les alphanumériques et les espaces
     */
    $("#input_marque").focusout(function () {
        checkValues(/^[a-zA-z0-9 ]+$/, "marque");
    });
    
    /**
     * Valide la valeur du modèle
     * Structure : n'accepte que les alphanumériques et les espaces
     */
    $("#input_modele").focusout(function () {
        checkValues(/^[a-zA-z0-9 ]+$/, "modele");
    });
    
    /**
     * Revérifie les valeurs des champs au moment de la validation
     *      (Redondant, mais au cas où)
     */
    $("#validate_vehicule").click(function () {
        checkValues(/^([0-9]{5}-){3}[0-9]{5}$/, "chassis");
        checkValues(/^(1-)?[a-zA-Z]{3}-[0-9]{3}$/, "plaque");
        checkValues(/^[a-zA-z0-9 ]+$/, "marque");
        checkValues(/^[a-zA-z0-9 ]+$/, "modele");
    });
});
