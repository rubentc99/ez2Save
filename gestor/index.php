<?php

require "clases/Bd.php";
require "clases/Usuario.php";

    if(isset($_POST) && !empty($_POST)){

        $email = addslashes($_POST['email']); //addslashes contra la inyeccion
        $pass = addslashes($_POST['password']);

        $usuario = new Usuario();
        if($usuario->login($email, $pass)){
            header("location:home.php");
        }else{
            echo "<script>alert('Usuario o contraseña incorrectos.')</script>";
        }
    }
?>
<!doctype html>
<html lang="es">
<?php
    include "includes/head.php";
?>
<body>
    <header>
        <div class="dark_header_index">
            <div class="img_box_login">
                <img src="img/ez2save_blanco.png">
            </div>
        </div>
    </header>
    <section>
        <div class="login_box">
            <div class="bottom_box_border">
                <div class="txt_top"><p>Iniciar sesión</p></div>
            </div>
            <form id="form_login" name="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="login_form_box_1">
                    <label id="login_email_label">Email:</label><input id="login_email_input" type="email" name="email">
                </div>
                <div class="login_form_box_2">
                    <label id="login_pass_label">Contraseña:</label><input id="login_pass_input" type="password" name="password">
                </div>
                <div class="btn_login_box"><input id="btn_login" type="submit" value="Entrar"></div>
            </form>
            <div class="register_text"><a href="register.php">¿No tienes cuenta? Regístrate</a></div>
            <div class="forget_text"><a>¿Has olvidado tu contraseña?</a></div>
        </div>
    </section>
</body>
</html>
