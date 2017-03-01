function checkValues(regex, id, group, tip){
    if (regex.test($(id).val())) {
        $(group).removeClass("has-error");
        $(group).addClass("has-success");
        $(tip).hide();
    } else {
        $(group).removeClass("has-success");
        $(group).addClass("has-error");
        $(tip).show();
    }
}

$(document).ready(function() {
    $(".tips").hide();

    $("#numero_chassis").focusout(function(){
        var regex = /^([0-9]{5}-){3}[0-9]{5}$/;
        checkValues(regex, "#numero_chassis", "#group_chassis", "#tip_chassis");
    });
    
    $("#plaque").focusout(function(){
        var regex = /^(1-)?[A-Z]{3}-[0-9]{3}$/;
        checkValues(regex, "#plaque", "#group_plaque", "#tip_plaque");
    });
    
    $("#marque").focusout(function () {
        var regex = /^[a-zA-z0-9]+$/;
        checkValues(regex, "#marque", "#group_marque", "#tip_marque");
    });
    
    $("#modele").focusout(function () {
        var regex = /^[a-zA-z0-9]+$/;
        checkValues(regex, "#modele", "#group_modele", "#tip_modele");
    });
});
