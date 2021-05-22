<?php


class Usuario
{
    private $id;
    private $permiso;
    private $nombre;
    private $apellidos;
    private $email;
    private $pass;
    private $tabla;

    /**
     * Usuario constructor.
     * @param $id
     * @param $permiso
     * @param $nombre
     * @param $apellidos
     * @param $email
     * @param $pass
     * @param $tabla
     */
    public function __construct($id="", $permiso="", $nombre="", $apellidos="", $email="", $pass="")
    {
        $this->permiso = $permiso;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->pass = $pass;
        $this->tabla = "usuarios";
    }
    public function llenarObjeto($id="", $permiso="", $nombre="", $apellidos="", $email="", $pass="")
    {
        $this->permiso = $permiso;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->pass = $pass;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPermiso()
    {
        return $this->permiso;
    }

    /**
     * @param mixed $permiso
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setemail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function obtenerPorId($id){

        $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$id;

        $conexion= new Bd();
        $res = $conexion->consulta($sql);

        list($mail, $permiso, $pass,  $nombre, $apellidos, $id) = mysqli_fetch_array($res);

        $this->llenarObjeto($mail, $permiso, $pass,  $nombre, $apellidos, $id);

    }

    public function login($email, $pass){
        $conexion = new Bd();
        $sql = "SELECT id, nombre, email, permiso FROM ".$this->tabla." WHERE email='".$email."' AND pass='".md5($pass)."'";
        //echo $sql;
        $res = $conexion->consulta($sql);
        if($conexion->numeroElementos()>0){
            list($id, $nombre, $permiso) = mysqli_fetch_array($res);
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['email'] = $email;
            $_SESSION['permiso'] = $permiso;
            $respuesta = true;
        }else{
            $respuesta = false;
        }
        return $respuesta;
    }

    public function registro($id, $nombre, $apellidos, $email, $pass){
        $conexion = new Bd();
        $permiso = 0;
        $pass=md5($pass); //añado el cifrado md5 a la contraseña
        $sql = "INSERT INTO ".$this->tabla." (id,permiso,nombre,apellidos,email,pass) VALUES ('$id','$permiso','$nombre','$apellidos','$email','$pass');";
        //echo $sql;
        $res = $conexion->consulta($sql);
        if($res){ //si $res está true, quiere decir que la query es correcta y se puede realizar la inserción
            list($id, $nombre, $permiso) = mysqli_fetch_array($res);
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['permiso'] = $permiso;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellidos'] = $apellidos;
            $_SESSION['email'] = $email;
            $respuesta = true;
        }else{
            $respuesta = false;
        }
        return $respuesta;
    }

}