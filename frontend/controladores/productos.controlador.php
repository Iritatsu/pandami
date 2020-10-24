<?php 

class ControladorProductos{

    /**categorias */
    static public function ctrMostrarCategorias($item, $valor){

        $tabla = "categorias";

        $respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;
    }
/**Subcategorias */
    static public function ctrMostrarSubCategorias($item, $valor){

        $tabla = "subcategorias";

        $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);

        return $respuesta;
    }
}