<?php
    require_once  "clases/Categoria.php";
    require_once "clases/Bd.php";
    require_once "includes/protect.php";

    $categoria = new Categoria();

    //este codigo se utiliza en el caso de estemos entrando a este formulario, por el botón de editar
    //en tal caso, vemos si viene un id por get, y en tal caso rellenamos el formulario con los datos para que se puedan modificar
    if(isset($_GET['id']) && !empty($_GET['id'])){ //si hay algo instaciado en el post llamado id, y si no está vacío
        $id = intval($_GET['id']); //capturo el id del objeto //el intval es para seguridad
        $categoria->obtenerPorId($id);
    }

    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['id'])){ //si viene un idCategoria por post, es porque hemos clickado en editar y queremos hacer una actualizacion
            //actualizo
            $id = intval($_POST['id']);
            $categoria->actualizar($id, $_POST);
        }
        $categoria->insertar($_POST, "categorias"); //inserto los datos del post
        header('location:home.php');
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
            <input type="hidden" name="id" value="<?php echo $categoria->getId()?>">
            <div class="form_category_name">
                <label>Nombre de la categoría: </label><input type="text" id="nombre" name="nombre" value="<?php echo $categoria->getNombre()?>">
            </div>
            <div class="form_category_money">
                <label>Valor a asignar: </label><input type="text" id="dinero" name="precio" value="<?php echo $categoria->getPrecio()?>">
            </div>
            <div class="btn_insert_category"><input type="button" id="insert_category_button" onclick="validarCategoria()" value="Aceptar"></div>
        </form>
    </div>
</section>
</body>
</html>