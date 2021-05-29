<?php
    require_once "clases/Dinero.php";
    require_once "clases/Bd.php";
    require_once "includes/protect.php";

    //creo un objeto vacío de tipo Dinero
    $dinero = new Dinero();

    //este codigo se utiliza en el caso de querer editar el dinero
    //en tal caso, vemos si viene un id por get, y en tal caso rellenamos el formulario con los datos para que se puedan modificar
    if(isset($_GET['id']) && !empty($_GET['id'])){ //si hay algo instaciado en el post llamado id, y si no está vacío
        $id = intval($_GET['id']); //capturo el id del objeto
        $dinero->obtenerPorId($id); //relleno el objeto
    }

    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['id'])){ //si viene un id por post, es porque hemos clickado en editar y queremos hacer una actualizacion
            $id = intval($_POST['id']); //asocio el id del objeto a una variable
            $dinero->actualizar($id, $_POST); //envio a la funcion actualizar el id, y la información que viene por post
            header('location:home.php'); //reenvio al home
        }
        $dinero->insertar($_POST, "dinero"); //inserto los datos del post
        header('location:home.php'); //reenvio al home
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
        <div class="create_money_div">
            <form id="form_money" name="money" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $dinero->getId()?>">
                <div class="form_category_money">
                    <label>Dinero a asignar: </label><input id="dinero" type="text" name="dinero" value="<?php echo $dinero->getDinero()?>">
                </div>
                <div class="btn_insert_category"><input id="insert_category_button" onclick="validarAgregarDinero()" type="button" value="Aceptar"></div>
            </form>
        </div>
    </section>
</body>
</html>