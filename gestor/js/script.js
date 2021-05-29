function validarRegistro() {
    ok = true;
    nombre = document.getElementById("register_name_input"); //capturo el campo nombre
    apellidos = document.getElementById("register_surname_input"); //capturo el campo apellidos
    email = document.getElementById("register_email_input"); //capturo el campo email
    pass1 = document.getElementById("register_password_input"); //capturo el campo contraseña
    pass2 = document.getElementById("register_password2_input"); //capturo el campo repetir contraseña

    if (nombre.value === "" && apellidos.value === "" && email.value === "" && pass1.value === "" && pass2.value === "") { //compruebo que los inputs no estén vacíos
        alert("Debes rellenar todos los campos.");
        //muestro errores de nombre y dinero
        errorNombre();
        errorApellidos();
        errorEmail();
        errorPass1();
        errorPass2();
    }else{
        validarNombre();
        validarApellidos();
        validarEmail();
        validarContrasenna();
    }
    if (ok) { //si los datos pasan la validación, hago el submit
        //id del form para hacer el submit
        document.getElementById('form_register').submit();
    }
}

function validarCategoria() {
    ok = true; //variable que define si la validacion es correcta y se puede hacer la insercion
    nombre = document.getElementById("nombre"); //capturo el campo nombre
    dinero = document.getElementById("dinero"); //capturo el campo dinero

    //valido los campos
    if(nombre.value === "" && dinero.value === ""){ //compruebo que los inputs no estén vacíos
        alert("Debes rellenar todos los campos.");
        //muestro errores de nombre y dinero
        errorNombre();
        errorDinero();
    }else { //si los 2 inputs están rellenos, comienzo las demás validaciones
        validarNombre(); //funcion que valida el nombre
        validarDinero(); //funcion que valida el dinero
    }
    if (ok) { //si los datos pasan la validación, hago el submit
        //id del form para hacer el submit
        document.getElementById('form_category').submit();
    }
}
function validarAgregarDinero() {
    ok = true; //variable que define si la validacion es correcta y se puede hacer la insercion
    dinero = document.getElementById("dinero"); //capturo el campo dinero

    if(dinero.value === ""){
        alert("Debes introducir una cantidad de dinero.");
        errorDinero();
    }else if(isNaN(dinero.value)) { //con isNaN compruebo si lo introducido es un numero
        alert("El campo 'Dinero a asignar' debe contener un número entero.");
        errorDinero();
    }else{ //si está correcto quito el borde rojo y lo dejo normal
        dinero.style.border = "none";
    }

    if (ok) { //si los datos pasan la validación, hago el submit
        //id del form para hacer el submit
        document.getElementById('form_money').submit();
    }
}



function validarNombre() {
    if (nombre.value === "") { //si el nombre está vacío muestro error
        alert("Debes introducir el nombre");
        errorNombre();
    }else if (nombre.value.length < 3) { //si el nombre es menor a 6 caracteres muestro error
        alert("El nombre debe contener al menos 3 caracteres.");
        errorNombre();
    }else{ //si está correcto quito el borde rojo y lo dejo normal
        nombre.style.border = "none";
    }
}
function validarDinero() {
    if (dinero.value === "") { //si el dinero está vacío muestro error
        alert("Debes introducir el dinero");
        errorDinero();
    }else if(isNaN(dinero.value)) { //con isNaN compruebo si lo introducido es un numero
        alert("El campo 'Valor a asignar' debe contener un número entero.");
        errorDinero();
    }else{ //si está correcto quito el borde rojo y lo dejo normal
        dinero.style.border = "none";
    }
}
function validarApellidos() {
    if (apellidos.value === "") { //si el nombre está vacío muestro error
        alert("Debes introducir los apellidos");
        errorApellidos();
    }else if (apellidos.value.length < 6) { //si el nombre es menor a 6 caracteres muestro error
        alert("Los apellidos deben contener al menos 6 caracteres.");
        errorApellidos();
    }else{ //si está correcto quito el borde rojo y lo dejo normal
        apellidos.style.border = "none";
    }
}
function validarEmail() { //validación de email mediante expresiones regular
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email.value)) {
        email.style.border = "none";
    }else{
        errorEmail();
    }
}
function validarContrasenna() {
    if(pass1.value === ""){ //verifico que el campo no esté vacío
        alert("Debes rellenar el campo 'Contraeña'");
        errorPass1();
    }else if (pass1.value.length < 6){ //verifico que sean mas de 6 caracteres
        alert("La contraseña debe contener al menos 6 caracteres.");
        errorPass1();
    }else{
        pass1.style.border = "none";
    }
    if(pass2.value === ""){ //verifico que el campo no esté vacío
        alert("Debes rellenar el campo 'Repetir contraseña'");
        errorPass2();
    }else{
        pass2.style.border = "none";
    }
    if(pass1.value !== pass2.value){ //verifico que coincidan las contraseñas
        alert("Las contraseñas no coinciden");
        errorPass1();
        errorPass2();
    }else{
        pass1.style.border = "none";
        pass2.style.border = "none";
    }
}

function errorNombre() { //funcion para mostrar que el error está en el campo nombre
    nombre.style.border = "2px solid red";
    ok = false;
}
function errorDinero() { //funcion para mostrar que el error está en el campo dinero
    dinero.style.border = "2px solid red";
    ok = false;
}
function errorApellidos() {
    apellidos.style.border = "2px solid red";
    ok = false;
}
function errorEmail(){
    email.style.border = "2px solid red";
    ok = false;
}
function errorPass1() {
    pass1.style.border = "2px solid red";
    ok = false;
}
function errorPass2() {
    pass2.style.border = "2px solid red";
    ok = false;
}

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