var liste = function(tab){
    document.write("<ol>");
    for(var i in tab)
        document.write("<li>"+tab[i]+"</li><br/>");

    document.write("</ol>");
};

var demander = function(tab){
    for (var i=0 ; i<5 ; i++)
        tab[i] = prompt("Entrez un ingredient");
};

tab={};
demander(tab);
liste(tab);