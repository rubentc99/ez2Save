<aside>
    <div class="lat_menu">
        <div class="name_box">
            <!-- Con el código php, leo el id del usuario que viene del login, y muestro el nombre del usuario a continuación de "Gastos de "-->
            <p class="name_box_text">Gastos de <?php if(isset($_SESSION['id'])) echo $_SESSION['nombre']?></p>
        </div>
        <div class="lat_box" style="border-top: 1px solid #0077B6">
                <img src="img/save-money.png">
                <a href="./home.php"><p>Mi presupuesto</p></a>
        </div>
        <div class="lat_box">
            <img src="img/money.png">
            <a href="./add_money.php"><p>Agregar dinero</p></a>
        </div>
    </div>
</aside>