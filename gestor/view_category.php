<?php
    //requires
    require_once "includes/protect.php";
    require_once "clases/Categoria.php";
    require_once "clases/Bd.php";

    $id = $_GET['id']; //intval es por seguridad, para que el programa sepa que tiene que enviar un numero entero

    $categoria = new Categoria();
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
            <a id="add_subcategory_button" href="create_category.php">
                <div class="plus_img_div">
                    <img id="plus" src="img/plus_azul.png">
                </div>
                <p>Crear subcategoría</p>
            </a>
        </div>
        <div class="verCategoria">
            <?php
                echo $categoria->verCategoria();
            ?>
        </div>
    </section>
</body>
</html>
