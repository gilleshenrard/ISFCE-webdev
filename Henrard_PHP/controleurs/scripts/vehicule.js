/**
 * Compare le regex envoyé à la valeur de ID, et impacte le form-group et le tip en conséquence
 * @param {string} regex
 * @param {string} id
 */
function checkValues(regex, id){
    if (regex.test($("#input_"+id).val())) {
        $("#group_"+id).removeClass("has-error");
        $("#group_"+id).addClass("has-success");
        $("#tip_"+id).addClass("hidden");
        $("#validate_vehicule").prop("disabled",false);
    } else {
        $("#group_"+id).removeClass("has-success");
        $("#group_"+id).addClass("has-error");
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
        var regex = /^([0-9]{5}-){3}[0-9]{5}$/;
        checkValues(regex, "chassis");
    });
        
    /**
     * Valide la valeur du numéro de plaque
     * Structure : [1-]ABC-123 ou [1-]abc-123
     */
    $("#input_plaque").focusout(function(){
        var regex = /^(1-)?[a-zA-Z]{3}-[0-9]{3}$/;
        checkValues(regex, "plaque");
    });
    
    /**
     * Valide la valeur de la marque
     * Structure : n'accepte que les alphanumériques
     */
    $("#input_marque").focusout(function () {
        var regex = /^[a-zA-z0-9]+$/;
        checkValues(regex, "marque");
    });
    
    /**
     * Valide la valeur du modèle
     * Structure : n'accepte que les alphanumériques
     */
    $("#input_modele").focusout(function () {
        var regex = /^[a-zA-z0-9]+$/;
        checkValues(regex, "modele");
    });
});
