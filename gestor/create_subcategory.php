<?php
    require_once "clases/Subcategoria.php";
    require_once "clases/Bd.php";
    require_once "includes/protect.php";

    $subcategoria = new Subcategoria();

    //var_dump($_GET);

    //con este switch lo que hago es distinguir entre los distintos valores que pueden venir por $_GET y depende del valor, asignar un valor al idGET
    /*if(isset($_GET)) {
        switch (key($_GET)){
            case ('idCategoria'):{
                $idGET = $_GET['idCategoria'];
            }
            case('idSubcategoria'):{
                $idGET = $_GET['idSubcategoria'];
                echo "entra";
            }
        }
    }*/


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
    //sólo entrará en el primer get y de esta forma quedará definido el valor de $idGET

    /*
    //Si viene un idCategoria por _GET es porque queremos añadir una subcategoría nueva
    if(isset($_GET['idCategoria']) && !empty($_GET['idCategoria'])){ //si hay algo instaciado en el post llamado id, y si no está vacío
        $subcategoria->setIdCategoria($_GET);
    }*/

    //con este echo compruebo que por GET viene el id de la categoria seleccionada

    /*
    //si el post está instanciado y trae información, es porque queremos hacer la inserción
    if(isset($_POST) && !empty($_POST)){
        //var_dump($_POST);
        $subcategoria->insertar($_POST, "subcategorias"); //inserto los datos del post
        //header('location:home.php');
    }
    */

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
            <div class="category_creation_div">
                <form id="form_category" name="category" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $subcategoria->getId()?>">
                    <input type="hidden" name="idCategoria" value="<?php echo $idGET?>">
                    <div class="form_category_name">
                        <label id="category_name_label">Nombre de la subcategoría: </label><input id="category_name_input" type="text" name="nombre" value="<?php echo $subcategoria->getNombre()?>">
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
