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

    public function getId()
    {
        return $this->id;
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
            <a href='./view_subcategory.php?id=".$this->id."'><div class='subcategory_name' style='width: 150px; margin-left: 55px'><p>$this->nombre</p></a></div>
            <div class='precios' style='width: 60px;margin-left: 436px'><p>$this->precio ???</p></div>
            <div class='view_subcategory_edit_icon' style='width: 25px;margin-left: 510px'><a href='./create_subcategory.php?idSubcategoria=".$this->id."&idCategoria=".$this->idCategoria."'><img src='./img/editar.png'></a></div>
            <div class='view_subcategory_delete_icon' style='margin-left: 10px'><a href='javascript:borrarSubcategoria(".$this->id.")'><img src='./img/delete.png'></a></div>
        </div>";
        return $html;
    }

    public function verSubcategoria(){
        $html= "<div class='view_subcategory_titles_container'>
            <div class='view_subcategory_titles_names' style='margin-left: 5%'><p>Referencia</p></div>
            <div class='view_subcategory_titles_names' style='margin-left: 10%'><p>Referencia Categoria</p></div>
            <div class='view_subcategory_titles_names' style='margin-left: 10%'><p>Nombre</p></div>
            <div class='view_subcategory_titles_names' style='margin-left: 10%'><p>Dinero asignado</p></div>
            </div>";
        $html.= "<div class='view_subcategory_info_container'>
            <div class='view_subcategory_info' style='margin-left: 9%'><p>$this->id</p></div>
            <div class='view_subcategory_info' style='margin-left: 24%'><p>$this->idCategoria</p></div>
            <div class='view_subcategory_info' style='margin-left: 19%'><p>$this->nombre</p></div>
            <div class='view_subcategory_info' style='margin-left: 18.5%'><p>$this->precio ???</p></div>
            <!--en el bot??n de editar categor??a, env??o por get ambos id's, ya lo que los necesitar?? para:
            1. Recoger los datos del objeto subcategoria ya creado y mostrarlos en los inputs 
            2. Necesito el id de la categor??a a la que pertence para realizar el update (aunque al recoger los datos del objeto tambi??n recojo el idCategoria,
            para otros casos como la creaci??n de categor??a necesito una variable que sirva para cualquier situaci??n, y esa variable es idGET)-->
            <div class='view_subcategory_edit_icon' style='margin-left: 10%'><a href='./create_subcategory.php?idSubcategoria=".$this->id."&idCategoria=".$this->idCategoria."'><img src='./img/editar.png'></a></div>
            <div class='view_subcategory_delete_icon' style='margin-left: 1%'><a href='javascript:borrarSubcategoria(".$this->id.")'><img src='./img/delete.png'></a></div>";
        return $html;
    }
}