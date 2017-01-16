var toImg = function(number){
    for(var i in number){
        document.write("<img src='img/"+charAt(i)+".gif' alt='"+charAt(i)+".gif />");
    }
};

var nbr = prompt("Entrez un nombre");
document.write("<h1>Votre nombre :</h1>");
toImg(nbr);