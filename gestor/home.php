<?php
    require_once "clases/Bd.php";
    require_once "clases/ListaCategorias.php";
    require_once "clases/Categoria.php";
    require_once "clases/SubCategoria.php";
    require_once "includes/protect.php";

    $lista = new ListaCategorias();
    if(isset($_GET['buscar']) && !empty($_GET['buscar'])){
        $lista->obtenerElementos();
    }else{
        $lista->obtenerElementos();
    }
    //var_dump($lista);
?>
<!DOCTYPE html>
<html>
<?php
    include "includes/head.php";
?>
<body>
    <header>
        <div class="dark_header">
            <div class="img_box_home" style="float: left">
                <a href="./home.php">
                    <img src="img/ez2save_blanco.png">
                </a>
            </div>
            <div class="money_asigned">
                <div class="img_money_asigned">
                    <img src="img/dialogo_largo_azul_relleno.png">
                    <p><?php echo $lista->getPrecioTotal().'€'?></p>
                    <p id="to_be_asigned">Por ser asignados</p>
                </div>
        </div>
    </header>
    <?php
        include "includes/aside.php";
    ?>
    <section>
        <div class="new_category_button_div">
            <a id="add_category_button" href="create_category.php">
                <div class="plus_img_div">
                    <img src="img/plus_azul.png">
                </div>
                <p>Crear categoría</p>
            </a>
        </div>
        <div class="categories_container">
            <?php
                echo $lista->listaCategorias();
            ?>
        </div>
    </section>
</body>
</html>
