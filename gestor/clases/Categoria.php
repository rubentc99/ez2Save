<?php

class Categoria
{
    private $id;
    private $nombre;
    private $precio;

    /**
     * Categoria constructor.
     * @param $id
     * @param $nombre
     * @param $precio
     */
    public function __construct($id="", $nombre="", $precio=""){
        $this->id = $id;
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
        $conexion->uppdateBD($id, "categorias", $datos);
    }

    public function borrar($id){
        $conexion = new Bd();
        $sql = "DELETE FROM categorias WHERE id =".$id;
        //echo $sql;
        $conexion->consulta($sql);
    }

    public function obtenerPorId($id){
        $sql = "SELECT id, nombre, precio FROM categorias WHERE id=".$id;
        $conexion = new Bd();
        $res = $conexion->consulta($sql);
        //uso list en vez de while porque me va a devolver una sola fila
        list($id, $nombre, $precio) = mysqli_fetch_array($res);
        $this->__construct($id, $nombre, $precio);
    }

    public function imprimirContenido(){
        //$html = "<div class='content'>$this->id $this->nombre $this->precio</div>";
        $html = "<div class='category_content' style='background-color: #90E0EF'>
            <!---->
            <div class='img_checkbox_div'><a href='./view_category.php?id=".$this->id."'><img src='./img/checkbox_gris.png'></a></div>
            <div class='category_name'><p>$this->nombre</p></div>
            <div class='category_price'><p>$this->precio €</p></div>
            <!--en el botón de añadir subcategoría, ncesito mandar el id de la categoría para asociarlo al objeto subcategoria-->
            <div class='add_subcategory_icon'><a href='./create_subcategory.php?idCategoria=".$this->id."'><img src='./img/plus_black.png'></a></div>
            <div class='list_category_edit_icon'><a href='./create_category.php?id=".$this->id."'><img src='./img/editar.png'></a></div>
            <div class='list_category_delete_icon'><a href='javascript:borrarCategoria(".$this->id.")'><img src='./img/delete.png'></a></div>
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
            <div><p>$this->id</p></div>
            <div><p>$this->nombre</p></div>
            <div><p>$this->precio €</p></div>
            <div class='view_category_edit_icon'><a href='./create_category.php?id=".$this->id."'><img src='./img/editar.png'></a></div>
            <div class='view_category_delete_icon'><a href='javascript:borrarCategoria(".$this->id.")'><img src='./img/delete.png'></a></div>";
        return $html;
    }
}
