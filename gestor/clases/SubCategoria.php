<?php


class SubCategoria
{
    private $idSubcategoria;
    private $idCategoria;
    private $nombre;
    private $precio;

    /**
     * SubCategoria constructor.
     * @param $idSubcategoria
     * @param $idCategoria
     * @param $nombre
     * @param $precio
     */
    public function __construct($idSubcategoria="", $idCategoria="", $nombre="", $precio="")
    {
        $this->idSubcategoria = $idSubcategoria;
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->idSubcategoria;
    }

    /**
     * @param mixed $id
     */
    public function setId($idSubcategoria)
    {
        $this->id = $idSubcategoria;
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

    public function actualizar($id, $datos){
        $conexion = new Bd();
        $conexion->uppdateBD($id, "subcategorias", $datos);
    }

    public function borrar($id){
        $conexion = new Bd();
        $sql = "DELETE FROM subcategorias WHERE id =".$id;
        //echo $sql;
        $conexion->consulta($sql);
    }

    public function obtenerPorId($id){
        $sql = "SELECT id, idCategoria, nombre, precio FROM subcategorias WHERE id=".$id;
        $conexion = new Bd();
        $res = $conexion->consulta($sql);
        //uso list en vez de while porque me va a devolver una sola fila
        list($id, $idCategoria, $nombre, $precio) = mysqli_fetch_array($res);
        $this->__construct($id, $idCategoria, $nombre, $precio);
    }

    public function imprimirContenido(){
        $html = "<div class='subcategory_content'>
            <a href='./view_subcategory.php?id=".$this->idSubcategoria."'><div class='subcategory_name' style='width: 150px; margin-left: 55px'><p>$this->nombre</p></a></div>
            <div class='precios' style='margin-left: 436px'><p>$this->precio €</p></div>
        </div>";
        return $html;
    }

    public function verSubcategoria(){
        $html= "<div class='view_subcategory_titles_container'>
            <div class='view_subcategory_titles_names'><p>Referencia</p></div>
            <div class='view_subcategory_titles_names'><p>Referencia Categoria</p></div>
            <div class='view_subcategory_titles_names'><p>Nombre</p></div>
            <div class='view_subcategory_titles_names'><p>Dinero asignado</p></div>
            </div>";
        $html.= "<div class='view_subcategory_info_container'>
            <div><p>$this->idSubcategoria</p></div>
            <div><p>$this->idCategoria</p></div>
            <div><p>$this->nombre</p></div>
            <div><p>$this->precio €</p></div>
            <div class='view_subcategory_edit_icon'><a href='./create_subcategory.php?id=".$this->idSubcategoria."'><img src='./img/editar.png'></a></div>
            <div class='view_subcategory_delete_icon'><a href='javascript:borrarCategoria(".$this->idSubcategoria.")'><img src='./img/delete.png'></a></div>";
        return $html;
    }
}