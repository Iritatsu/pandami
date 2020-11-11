<?php 

require_once "conexion.php";

class ModeloProductos{
        /**categorias */
    static public function mdlMostrarCategorias($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
    

        }else{

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetchAll();

        }

        $stmt = null;
    }

    /**subcategorias */
    static public function mdlMostrarSubCategorias($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> null;
    }

    // MOSTRAR PRODUCTOS
    static public function mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

        if($item != null){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        
        $stmt -> execute();

        return $stmt -> fetchAll();


        }else{

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");
        
        $stmt -> execute();

        return $stmt -> fetchAll();

       
        }
        $stmt =null;
    }

      /**MOSTRAR INFOPRODUCTO */
      static public function mdlMostrarInfoProducto($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> null;
    }

    // LISTAR PRODUCTOS
    static public function mdlListarProductos($tabla, $ordenar, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC ");

            $stmt -> bindParam (":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC ");
            $stmt -> execute();

            return $stmt -> fetchAll();
        }

        $stmt = null;

    }

     /**MOSTRAR BANNER */
     static public function mdlMostrarBanner($tabla, $ruta){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta= :ruta");

        $stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> null;
    }

    //BUSCADOR
    static public function mdlBuscarProductos($tabla, $busqueda, $base, $tope, $ordenar, $modo){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%'  OR descripcion like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope ");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> null;
        
    }

    //LISTAR PRODUCTOS BUSCADOR
    static public function mdlListarProductosBusqueda($tabla, $busqueda){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%'  OR descripcion like '%$busqueda%'");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> null;
        
    }
    // ACTUALIZAR VISTA PRODUCTO
    static public function mdlActualizarVistaProducto($tabla, $datos, $item){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":".$item, $datos["valor"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

        $stmt = null;
        
    }
 }

