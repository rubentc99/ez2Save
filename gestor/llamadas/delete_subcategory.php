<?php
//requires
require  "../includes/protect.php";
require_once "../home.php";
require_once "../clases/SubCategoria.php";
require_once "../clases/Bd.php";

$id = intval($_GET['id']); //intval para la inyeccion

//borro el elemento de la BD
$subcategoria = new SubCategoria();
$subcategoria->borrar($id);


//Pido de nuevo la lista de elementos y la envio a AJAX
$lista = new ListaCategorias();
$lista->obtenerElementos();

echo $lista->listaCategorias();
