<?php
    require_once "clases/Bd.php";
    require_once "clases/ListaCategorias.php";
    require_once "clases/Dinero.php";
    require_once "clases/Categoria.php";
    require_once "clases/SubCategoria.php";
    require_once "includes/protect.php";


    $lista = new ListaCategorias();
    $objDinero = new Dinero(); //creo un objeto de tipo dinero para recoger la cantidad de dinero introducida previamente por el usuario

    $objDinero->obtenerPorId(1); //meto los datos en el objeto dinero
    $ingresos = $objDinero->getDinero(); //le asigno a la variable ingresos, el valor del dinero mediante su getter

    //en la variable gastos almacenaré el sumatorio de los gastos de la categoría
    $gastos = $lista->obtenerElementos();

    //creo la variable dinero, que será la diferencia entre ingresos y gastos. (Es suma porque los gastos vienen en negativo)
    $dinero = $ingresos + $gastos;
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
                    <p><?php echo $dinero.'€'?></p>
                    <p id="to_be_asigned">Por ser asignados</p>
                    <div class="img_pencil">
                        <!--En la imagen del lapiz mando el id 1, que es el id único del dinero, para que en el
                        código en vez de hacer un insert, se haga un update-->
                        <a href="add_money.php?id=1"><img src="img/pencil.png"></a>
                    </div>
                </div>
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
