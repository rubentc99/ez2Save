function ajax() {
    try {
        req = new XMLHttpRequest();
    } catch(err1) {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                req = false;
            }
        }
    }
    return req;
}

var borrar = new ajax();
function borrarCategoria(id) {
    if(confirm("¿Seguro que deseas eliminar la categoría de la base de datos?")) {
        var myurl = 'llamadas/delete_category.php';
        myRand = parseInt(Math.random() * 999999999999999);
        modurl = myurl + '?rand=' + myRand + '&id=' + id;
        borrar.open("GET", modurl, true); //pasa a delete_category.php
        borrar.onreadystatechange = borrarCategoriaResponse;
        borrar.send(null);
    }
}
function borrarCategoriaResponse() {
    if (borrar.readyState == 4) {
        if(borrar.status == 200) {
            var listaCategorias = borrar.responseText;
            //window.location.reload();
            document.getElementsByClassName('lista')[0].innerHTML = listaCategorias;
            //document.getElementById('lista').innerHTML =  listaCategorias;
        }
    }
}
function borrarSubcategoria(id) {
    if(confirm("¿Seguro que deseas eliminar la subcategoría de la base de datos?")) {
        var myurl = 'llamadas/delete_subcategory.php';
        myRand = parseInt(Math.random() * 999999999999999);
        modurl = myurl + '?rand=' + myRand + '&id=' + id;
        borrar.open("GET", modurl, true); //pasa a delete_category.php
        borrar.onreadystatechange = borrarSubcategoriaResponse;
        borrar.send(null);
    }
}
function borrarSubcategoriaResponse() {
    if (borrar.readyState == 4) {
        if(borrar.status == 200) {
            var listaCategorias = borrar.responseText;
            //window.location.reload();
            document.getElementsByClassName('lista')[0].innerHTML = listaCategorias;
            //document.getElementById('lista').innerHTML =  listaCategorias;
        }
    }
}