<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimun-scale=1.0, maximun-scale=1.0, user-scalable=no">
    
    <meta class="title" content="Tienda Virtual"> 

    <meta class="descripcion" content="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit velit voluptates eveniet vero debitis odio veritatis quisquam">
    
    <meta class="keyword" content="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi perferendis perspiciatis beatae nihil, eos incidunt minus sed ">
    <title>pandami</title>
    <?php 
        $icono = ControladorPlantilla::ctrEstiloPlantilla();

        echo '<link rel="icon" href="http://localhost/pandami/backend/' .$icono["icono"].'">';

        /**Mantener la ruta fija del proyecto */

        $url = Ruta::ctrRuta();
       
        

            ?>
    
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">
    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>
    
</head>
<body>

<?php
/*Cabezotee */
include "modulos/cabezote.php";
/**contenido dinamico */
$rutas = array();
$ruta = null;

if(isset($_GET["ruta"])){
    
    $rutas = explode("/", $_GET["ruta"]);

    $item = "ruta";
    $valor = $rutas[0];
/**url amigable categoria */
    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

    if(is_array($rutaCategorias) && $rutas[0] == $rutaCategorias["ruta"]){

        $ruta =  $rutas[0];

    };
    /**url amigable subcategoria */

    $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

    foreach ($rutaSubCategorias as $key => $value) {
            if($rutas[0] == $value["ruta"]){
            $ruta =  $rutas[0];
            }
        }
    

/* LISTA BLANCA DE URL AMIGABLE*/
    if($ruta != null){

        include "modulos/productos.php";

    }else{

        include "modulos/error404.php";
    }
}
?>

<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>  
  

</body>
</html>