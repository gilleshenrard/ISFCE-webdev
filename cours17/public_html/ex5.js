var aire = function(hauteur, largeur){
    return hauteur*largeur;
};

var perimetre = function(hauteur, largeur){
    return 2*hauteur + 2*largeur;
};

var calc = function(hauteur, largeur, fct){
    if(isNaN(hauteur) | isNaN(largeur)){
        alert("Les valeurs doivent être des chiffres!");
        return undefined;
    }
    else
        return fct(hauteur, largeur);
};

var h = prompt("Entrez la hauteur");
var w = prompt("Entrez la largeur");
document.write("Aire : "+calc(h, w, aire)+"<br/>");
document.write("Perimetre : "+calc(h, w, perimetre)+"<br/>");