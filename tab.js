function openTab(evt, openTab) {
    var i, cont, tab;
    cont = document.getElementsByClassName("tab");
    for (i = 0; i < cont.length; i++) {
        cont[i].className = cont[i].className.replace(" active", "");
    }
    tab = document.getElementsByClassName("cont");
    for (i = 0; i < tab.length; i++) {
        tab[i].className = tab[i].className.replace(" active", "");
    }
    document.getElementById(openTab).className = 'cont active';
    evt.currentTarget.className = "tab active";
}