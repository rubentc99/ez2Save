<?php

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