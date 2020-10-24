<?php
class ControladorPlantilla{

    /*llamamos plantilla*/ 
    public function plantilla(){

        include "vistas/plantilla.php";
    }
    /*traemos estilos dinamicos de la plantilla*/

    public function ctrEstiloPlantilla(){
        $tabla = "plantilla";

        $respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);

        return $respuesta;
    }
}
