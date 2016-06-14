
function mostrarCaja(tipo) {
    document.getElementById('campoSorpresa').style.display = 'none';
    document.getElementById('campoNegra').style.display = 'none';
    document.getElementById('campoFuerte').style.display = 'none';
    switch (tipo) {
        case 'sorpresa':
            document.getElementById('campoSorpresa').style.display = 'block';
            break;
        case 'negra':
            document.getElementById('campoNegra').style.display = 'block';
            break;
        case 'fuerte':
            document.getElementById('campoFuerte').style.display = 'block';
            break;
    }
}

function obtenerEstantesLibres(id_estanteria) {
    var xmlhttp;
    if (id_estanteria == "" || id_estanteria == "-1") {
        document.getElementById("ESTANTESLIBRES").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }







    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ESTANTESLIBRES").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "Controlador/controladorEstantesLibres.php?id_estanteria=" + id_estanteria, true);
    xmlhttp.send();


}



function zetaIndex() {
    var primeraColumna;
    var segundaColumna;
    var terceraColumna;

}



