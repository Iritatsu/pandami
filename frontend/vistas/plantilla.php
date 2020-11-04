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

    session_start();

        $servidor = Ruta::ctrRutaServidor();

        $icono = ControladorPlantilla::ctrEstiloPlantilla();

        echo '<link rel="icon" href="'.$servidor.$icono["icono"].'">';

        /**Mantener la ruta fija del proyecto */

        $url = Ruta::ctrRuta();
       
        

            ?>
    <!--PLUGINS CSS-->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 
    <!--CSS PERSONALIZADAS-->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">
    <!--PLUGINS JS-->
    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>
    
</head>
<body>

<?php
/*Cabezotee */
include "modulos/cabezote.php";
/**contenido dinamico */
$rutas = array();
$ruta = null;
$infoProducto = null;

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
    
    /**url amigable de productos */

    $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

    if(is_array($rutaProductos) && $rutas[0] == $rutaProductos["ruta"]){

        $infoProducto = $rutas[0];
    }
    


/* LISTA BLANCA DE URL AMIGABLE*/
    if($ruta != null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){

        include "modulos/productos.php";

    }else if ($infoProducto != null){
        
        include "modulos/infoproducto.php";

    }else if ($rutas[0] == "buscador"){
        
        include "modulos/buscador.php";

    }else{

        include "modulos/error404.php";
    }
}else{
    include "modulos/slide.php";

    include "modulos/destacados.php";
}
?>
<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
    <!--jS PERSONALIZADO -->
<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>  
<script src="<?php echo $url; ?>vistas/js/slide.js"></script>  
<script src="<?php echo $url; ?>vistas/js/buscador.js"></script>  

</body>
</html>