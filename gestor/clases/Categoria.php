<?php

class Categoria
{
    private $idCategoria;
    private $nombre;
    private $precio;

    /**
     * Categoria constructor.
     * @param $idCategoria
     * @param $nombre
     * @param $precio
     */
    public function __construct($idCategoria="", $nombre="", $precio=""){
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getId()
    {
        return $this->idCategoria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function insertar($datos, $tabla){
        $conexion = new Bd();
        //le mando el nombre de la tabla, los datos del post, la carpeta donde se van a almacenar las fotos, y la foto que se sube
        $conexion->insertarElementos($tabla, $datos);
    }

    public function actualizar($idCategoria, $datos){
        $conexion = new Bd();
        $conexion->uppdateBD($idCategoria, "categorias", $datos);
    }

    public function borrar($idCategoria){
        $conexion = new Bd();
        $sql = "DELETE FROM categorias WHERE id =".$idCategoria;
        //echo $sql;
        $conexion->consulta($sql);
    }

    public function obtenerPorId($idCategoria){
        $sql = "SELECT id, nombre, precio FROM categorias WHERE id=".$idCategoria;
        $conexion = new Bd();
        $res = $conexion->consulta($sql);
        //uso list en vez de while porque me va a devolver una sola fila
        list($idCategoria, $nombre, $precio) = mysqli_fetch_array($res);
        $this->__construct($idCategoria, $nombre, $precio);
    }

    public function imprimirContenido(){
        //$html = "<div class='content'>$this->id $this->nombre $this->precio</div>";
        $html = "<div class='category_content'>
            <!---->
            <div class='img_checkbox_div' style='margin-left: 10px'><a href='./view_category.php?id=".$this->idCategoria."'><img src='./img/checkbox_gris.png'></a></div>
            <div class='category_name' style='width:300px; margin-left: 15px'><p>$this->nombre</p></div>
            <div class='category_price' style='width: 100px; margin-left: 290px'><p>$this->precio ???</p></div>
            <!--en el bot??n de a??adir subcategor??a, ncesito mandar el id de la categor??a para asociarlo al objeto subcategoria-->
            <div class='add_subcategory_icon' style='margin-left: 435px'><a href='./create_subcategory.php?idCategoria=".$this->idCategoria."'><img src='./img/plus_black.png'></a></div>
            <div class='list_category_edit_icon' style='margin-left: 10px'><a href='./create_category.php?id=".$this->idCategoria."'><img src='./img/editar.png'></a></div>
            <div class='list_category_delete_icon' style='margin-left: 10px'><a href='javascript:borrarCategoria(".$this->idCategoria.")'><img src='./img/delete.png'></a></div>
        </div>";
        return $html;
    }

    public function verCategoria(){
        $html= "<div class='view_category_titles_container'>
            <div class='view_category_titles_names'><p>Referencia</p></div>
            <div class='view_category_titles_names'><p>Nombre</p></div>
            <div class='view_category_titles_names'><p>Dinero asignado</p></div>
            </div>";
        $html.= "<div class='view_category_info_container'>
            <div><p>$this->idCategoria</p></div>
            <div><p>$this->nombre</p></div>
            <div><p>$this->precio ???</p></div>
            <div class='view_category_edit_icon'><a href='./create_category.php?id=".$this->idCategoria."'><img src='./img/editar.png'></a></div>
            <div class='view_category_delete_icon'><a href='javascript:borrarCategoria(".$this->idCategoria.")'><img src='./img/delete.png'></a></div>";
        return $html;
    }
}
