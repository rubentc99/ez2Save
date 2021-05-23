<?php
    //requires
    require_once "includes/protect.php";
    require_once "clases/SubCategoria.php";
    require_once "clases/Bd.php";

    //como proviene del "home", capturamos el id que enviamos para poder visualizar esta categoria
    $id = $_GET['id']; //intval es por seguridad, para que el programa sepa que tiene que enviar un numero entero

    //creo un objeto categoría para almacenar los datos
    $subcategoria = new SubCategoria();

    //como estoy listando los datos, y tengo un ID que viene por GET, voy a buscar el objeto categoría asociado a ese id
    //y voy a meter esos datos en $subcategoria
    $subcategoria->obtenerPorId($id);

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
            <div class="view_subcategory">
                <?php
                    echo $subcategoria->verSubcategoria();
                ?>
            </div>
    </section>
</body>
</html>
