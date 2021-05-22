<?php


class SubCategoria
{
    private $id;
    private $idCategoria;
    private $nombre;
    private $precio;

    /**
     * SubCategoria constructor.
     * @param $id
     * @param $idCategoria
     * @param $nombre
     * @param $precio
     */
    public function __construct($id="", $idCategoria="", $nombre="", $precio="")
    {
        $this->id = $id;
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->precio = $precio;
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
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
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
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function insertar($datos, $tabla){
        $conexion = new Bd();
        //le mando el nombre de la tabla, los datos del post, la carpeta donde se van a almacenar las fotos, y la foto que se sube
        $conexion->insertarElementos($tabla, $datos);
    }

    public function imprimirContenido(){
        $html = "<div class='subcategory_content'>
            <div class='subcategory_name' style='margin-left: 70px'><a href='#'><p>$this->nombre</p></a></div>
            <div class='precios'><p>$this->precio</p></div>
        </div>";
        return $html;
    }

}