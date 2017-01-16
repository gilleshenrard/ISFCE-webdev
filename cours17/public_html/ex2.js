var tab=[];

tab[4]=700;
document.write(tab.length+"<br/>");

for(var j=0 ; j<2 ; j++){
    document.write("Premiere boucle<br/>");
    for (var i in tab){
        document.write("L'element "+i+" vaut "+tab[i]+"<br/>");
    }

    document.write("Deuxieme boucle<br/>");
    for (var i=0 ; i<tab.length ; i++){
        document.write("L'element "+i+" vaut "+tab[i]+"<br/>");
    }

    tab[2]=100;
    tab[6]=300;
}