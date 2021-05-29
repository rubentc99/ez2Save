<?php
    require_once "clases/Subcategoria.php";
    require_once "clases/Bd.php";
    require_once "includes/protect.php";

    $subcategoria = new Subcategoria();

    /***
     * Con estos if's lo que hago es asociar el valor a la variable $idGET dependiendo del valor que entre por $_GET.
     * En el caso de que vengan los 2 id's por $_GET (puede ser, concretamente si queremos actualizar una subcategoría necesitamos enviar ambos id's)
     * sólo entrará en el primer get y de esta forma quedará definido el valor de $idGET.
     */
    if (isset($_GET['idCategoria'])) {
        $idGET = $_GET['idCategoria'];
    } else if(isset($_GET['idSubcategoria'])){
        $idGET = $_GET['idSubcategoria'];
    }

    //si viene por get un id
    if(isset($_GET['idSubcategoria']) && !empty($_GET['idSubcategoria'])){ //si hay algo instaciado en el post llamado id, y si no está vacío
        $id = intval($_GET['idSubcategoria']); //capturo el id del objeto //el intval es para seguridad
        $subcategoria->obtenerPorId($id);
    }

    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['id'])){ //si viene un id por post, es porque hemos clickado en editar y queremos hacer una actualizacion
            echo("entra");
            //actualizo
            $id = intval($_POST['id']);
            $subcategoria->actualizar($id, $_POST);
        }else{
            //var_dump($_POST);
            $subcategoria->insertar($_POST, "subcategorias"); //inserto los datos del post
        }
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
            <div class="subcategory_creation_div">
                <form id="form_category" name="category" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $subcategoria->getId()?>">
                    <input type="hidden" name="idCategoria" value="<?php echo $idGET?>">
                    <div class="form_subcategory_name">
                        <label>Nombre de la subcategoría: </label><input id="nombre" type="text" name="nombre" value="<?php echo $subcategoria->getNombre()?>">
                    </div>
                    <div class="form_subcategory_money">
                        <label>Valor a asignar: </label><input id="dinero" type="text" name="precio" value="<?php echo $subcategoria->getPrecio()?>">
                    </div>
                    <div class="btn_insert_subcategory"><input id="insert_subcategory_button" onclick="validarCategoria()" type="button" value="Aceptar"></div>
                </form>
            </div>
        </section>
    </body>
</html>
