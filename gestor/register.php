<?php
    require_once "clases/Bd.php";
    require_once "clases/Usuario.php";

    $usuario = new Usuario();

    if (isset($_POST) && !empty($_POST)){
        $id = addslashes($_POST['id']);
        $nombre = addslashes($_POST['nombre']);
        $apellidos = addslashes($_POST['apellidos']);
        $email = addslashes($_POST['email']);
        $pass = addslashes($_POST['password']);
        if($usuario->registro($id, $nombre, $apellidos, $email, $pass)){
            echo "<script>alert('Usuario creado correctamente.')</script>";
            header("location:index.php");
        }else{
            echo "<script>alert('Error de registro.')</script>";
        }
    }


    /*if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=intval($_GET['id']);
        $usuario->obtenerPorId($id);
    }*/
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
        <div class="register_box">
            <div class="bottom_box_border">
                <div class="txt_top"><p>Registrarse</p></div>
            </div>
            <form id="form_register" name="register" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $usuario->getId()?>">
                <div class="register_form_box_1">
                    <div class="register_name_box">
                        <label id="register_name_label">Nombre:</label>
                        <input id="register_name_input" type="text" name="nombre" value="<?php echo $usuario->getNombre()?>">
                    </div>
                </div>
                <div class="register_form_box_2">
                    <div class="register_surname_box">
                        <label id="register_surname_label">Apellidos:</label>
                        <input id="register_surname_input" type="text" name="apellidos" value="<?php echo $usuario->getApellidos()?>">
                    </div>
                </div>
                <div class="register_form_box_3">
                    <div class="register_email_box">
                        <label id="register_email_label">Email:</label>
                        <input id="register_email_input" type="email" name="email" value="<?php echo $usuario->getemail()?>">
                    </div>
                </div>
                <div class="register_form_box_4">
                    <div class="register_password_box">
                        <label id="register_password_label">Contraseña:</label>
                        <input id="register_password_input" type="password" name="password" value="<?php echo $usuario->getPass()?>">
                    </div>
                </div>
                <div class="register_form_box_5">
                    <div class="register_password2_box">
                        <label id="register_password2_label">Repetir contraseña:</label>
                        <input id="register_password2_input" id="pass2" type="password">
                    </div>
                </div>
                <div class="btn_register_box"><input onclick="validarRegistro()" id="btn_register" type="button" value="Entrar"></div>
            </form>
        <div class="register_text"><a href="index.php">¿Ya tienes cuenta? Inicia sesión</a></div>
    </section>
</body>
</html>
