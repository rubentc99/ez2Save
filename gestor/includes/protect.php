<?php
@session_start();
if(!isset($_SESSION['id'])){ //para no poder hacer la trampa de entrar al index del tiron
    header("location:index.php");
}
