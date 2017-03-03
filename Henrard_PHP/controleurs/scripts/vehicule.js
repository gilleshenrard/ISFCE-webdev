/**
 * Compare le regex envoyé à la valeur de ID, et impacte le form-group et le tip en conséquence
 * @param {string} regex
 * @param {string} id
 * @param {string} group
 * @param {string} tip
 */
function checkValues(regex, id, group, tip){
    if (regex.test($(id).val())) {
        $(group).removeClass("has-error");
        $(group).addClass("has-success");
        $(tip).hide();
        $("#validate_vehicule").prop("disabled",false);
    } else {
        $(group).removeClass("has-success");
        $(group).addClass("has-error");
        $(tip).show();
        $("#validate_vehicule").prop("disabled",true);
    }
}

$(document).ready(function() {
    /**
     * Valide la valeur du numéro de chassis
     * Structure : 12345-12345-12345-12345
     */
    $("#numero_chassis").focusout(function(){
        var regex = /^([0-9]{5}-){3}[0-9]{5}$/;
        checkValues(regex, "#numero_chassis", "#group_chassis", "#tip_chassis");
    });
        
    /**
     * Valide la valeur du numéro de plaque
     * Structure : [1-]ABC-123 ou [1-]abc-123
     */
    $("#plaque").focusout(function(){
        var regex = /^(1-)?[a-zA-Z]{3}-[0-9]{3}$/;
        checkValues(regex, "#plaque", "#group_plaque", "#tip_plaque");
    });
    
    /**
     * Valide la valeur de la marque
     * Structure : n'accepte que les alphanumériques
     */
    $("#marque").focusout(function () {
        var regex = /^[a-zA-z0-9]+$/;
        checkValues(regex, "#marque", "#group_marque", "#tip_marque");
    });
    
    /**
     * Valide la valeur du modèle
     * Structure : n'accepte que les alphanumériques
     */
    $("#modele").focusout(function () {
        var regex = /^[a-zA-z0-9]+$/;
        checkValues(regex, "#modele", "#group_modele", "#tip_modele");
    });
});
