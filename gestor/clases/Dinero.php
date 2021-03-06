<?php


class Dinero
{
    private $id;
    private $dinero;

    /**
     * Dinero constructor.
     * @param $id
     * @param $dinero
     */
    public function __construct($id="", $dinero="")
    {
        $this->id = $id;
        $this->dinero = $dinero;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDinero()
    {
        return $this->dinero;
    }

    public function insertar($datos, $tabla){
        $conexion = new Bd();
        //le mando el nombre de la tabla, los datos del post, la carpeta donde se van a almacenar las fotos, y la foto que se sube
        $conexion->insertarElementos($tabla, $datos);
    }

    public function actualizar($id, $datos){
        $conexion = new Bd();
        $conexion->uppdateBD($id, "dinero", $datos);
    }

    public function obtenerPorId($id){
        $sql = "SELECT id, dinero FROM dinero WHERE id=".$id;
        $conexion = new Bd();
        $res = $conexion->consulta($sql);
        //uso list en vez de while porque me va a devolver una sola fila
        list($id, $dinero) = mysqli_fetch_array($res);
        $this->__construct($id, $dinero);
    }
}