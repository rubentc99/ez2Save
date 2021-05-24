<?php
    require_once "clases/Dinero.php";
    require_once "clases/Bd.php";
    require_once "includes/protect.php";

    $dinero = new Dinero();

    //este codigo se utiliza en el caso de estemos entrando a este formulario, por el botón de editar
    //en tal caso, vemos si viene un id por get, y en tal caso rellenamos el formulario con los datos para que se puedan modificar
    if(isset($_GET['id']) && !empty($_GET['id'])){ //si hay algo instaciado en el post llamado id, y si no está vacío
        $id = intval($_GET['id']); //capturo el id del objeto //el intval es para seguridad
        $dinero->obtenerPorId($id);
    }

    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['id'])){ //si viene un idCategoria por post, es porque hemos clickado en editar y queremos hacer una actualizacion
            //actualizo
            $id = intval($_POST['id']);
            $dinero->actualizar($id, $_POST);
        }
        $dinero->insertar($_POST, "dinero"); //inserto los datos del post
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
                <input type="hidden" name="id">
                <div class="form_category_money">
                    <label>Dinero a asignar: </label><input type="text" name="dinero"">
                </div>
                <div class="btn_insert_category"><input id="insert_category_button" type="submit" value="Aceptar"></div>
            </form>
        </div>
</section>
</body>
</html>