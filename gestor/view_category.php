<?php
    //requires
    require_once "includes/protect.php";
    require_once "clases/Categoria.php";
    require_once "clases/Bd.php";

    //como proviene del "home", capturamos el id que enviamos para poder visualizar esta categoria
    $id = $_GET['id']; //intval es por seguridad, para que el programa sepa que tiene que enviar un numero entero

    //creo un objeto categoría para almacenar los datos
    $categoria = new Categoria();

    //como estoy listando los datos, y tengo un ID que viene por GET, voy a buscar el objeto categoría asociado a ese id
    //y voy a meter esos datos en $categoria
    $categoria->obtenerPorId($id);

?>
<!doctype html>
<?php
    include "includes/head.php";
?>
<body>
    <?php
        include "includes/header.php";
        include "includes/aside.php";
    ?>
    <section>
        <div class="view_edit_delete_category">
            <a id="add_subcategory_button" href='./create_subcategory.php?idCategoria=<?php echo $categoria->getId()?>'>
                <div class="plus_img_div">
                    <img id="plus" src="img/plus_azul.png">
                </div>
                <p>Crear subcategoría</p>
            </a>
        </div>
        <div class="view_category">
            <?php
                echo $categoria->verCategoria();
            ?>
        </div>
    </section>
</body>
</html>
