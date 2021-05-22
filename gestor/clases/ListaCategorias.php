<?php

class ListaCategorias
{
    private $lista; //array donde se almacenará la consulta sql
    private $tabla; //variable para almacenar el nombre de la tabla "categorias"
    private $tablasub;  //variable para almacenar el nombre de la tabla "subcategorias"

    /**
     * ListaCategorias constructor.
     * @param $lista
     * @param $tabla
     */
    public function __construct()
    {
        $this->lista = array();
        $this->tabla = "categorias";
        $this->tablasub = "subcategorias";
    }


    public function obtenerElementos() { //al tener un valor = cadena vacía, si a esta funcion no le mando parámetro también va a funcionar
        //si sqlBusca está vacío, la query no se va a ver alterada, y si tiene algo me va a buscar respecto a ese algo
        $sql = "SELECT * FROM ".$this->tabla;
        $conexion = new Bd();
        $res = $conexion->consulta($sql);
        while (list($id, $nombre, $precio) = mysqli_fetch_array($res)) {
            //el mysqli lo que hace es coge el array entre parentesis de formato sql y lo devuelve de forma que php pueda trabajar con el
            $fila = new Categoria($id, $nombre, $precio);
            array_push($this->lista, $fila); //cada vez que este while actue, inserta las variables en la lista
            $sql2 = "SELECT * FROM ".$this->tablasub." WHERE idCategoria = ".$id;
            $res2 = $conexion->consulta($sql2);
            while (list($id, $idCategoria, $nombre, $precio) = mysqli_fetch_array($res2)) {
                $fila = new SubCategoria($id, $idCategoria, $nombre, $precio);
                array_push($this->lista, $fila); //cada vez que este while actue, inserta las variables en la lista
            }
        }
    }

    /***
     * Función encargada de imprimir la tabla donde se mostrarán los juegos. Para ello, la primera fila se creará manualmente mientras que las demás mediante bucle for.
     * @return string
     */
    public function listaCategorias(){
        //esto será la fila 1 de la tabla que servirá como referencia
        $html = "<div class='tittles'>
            <div class='category_name_div'><p>Nombre</p></div>
            <div class='category_money_div'><p>Dinero asignado</p></div>
            </div>";
        for($i = 0; $i<sizeof($this->lista);$i++){
            $html .= $this->lista[$i] -> imprimirContenido();
        }
        return $html;
    }
}