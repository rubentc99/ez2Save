<?php
require_once  "clases/Subcategoria.php";
require_once "clases/Bd.php";
require_once "includes/protect.php";

$subcategoria = new Subcategoria();

//Si viene
if(isset($_GET['idCategoria']) && !empty($_GET['idCategoria'])){ //si hay algo instaciado en el post llamado id, y si no está vacío
    $subcategoria->insertar($_POST, "subcategorias"); //inserto los datos del post
//    header('location:home.php');
}

if(isset($_GET['idSubCategoria']) && !empty($_GET['idSubCategoria'])){ //si hay algo instaciado en el post llamado id, y si no está vacío
    $id = intval($_GET['idSubCategoria']); //capturo el id del objeto //el intval es para seguridad
    $subcategoria->obtenerPorId($id);
}

if(isset($_POST) && !empty($_POST)){
    if(!empty($_POST['idSubCategoria'])){ //si viene un id por post, es porque hemos clickado en editar y queremos hacer una actualizacion
        //actualizo
        $id = intval($_POST['idSubCategoria']);
        $subcategoria->actualizar($id, $_POST);
    }
}

?>
<!doctype html>
<html lang="en">
<?php
include "includes/head.php";
?>
<body>
<?php
include "includes/header.php";
include "includes/aside.php";
?>
<section>
    <div class="category_creation_div">
        <form id="form_category" name="category" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $subcategoria->getId()?>">
            <div class="form_category_name">
                <label id="category_name_label">Nombre de la categoría: </label><input id="category_name_input" type="text" name="nombre" value="<?php echo $subcategoria->getNombre()?>">
            </div>
            <div class="form_category_money">
                <label>Valor a asignar: </label><input id="pass" type="text" name="precio" value="<?php echo $subcategoria->getPrecio()?>">
            </div>
            <div class="btn_insert_category"><input id="insert_category_button" type="submit" value="Aceptar"></div>
        </form>
    </div>
</section>
</body>
</html>
