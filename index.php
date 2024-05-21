<?php 
    require __DIR__.'/Slim/autoload.php';
    include("conex_db.php"); //Nos conectamos a la base de datos
    error_reporting(E_ALL & ~E_DEPRECATED); //Quitar todos los deprecated (errores)
    //error_reporting(E_ALL & ~E_NOTICE); //Quitar los notice
    //error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); Quitar ambos

    $app = new \Slim\App; //Objeto que tiene todos los endpoints que podemos hacer

    // -> Para coger cosas de un objeto
    $app->get("/", function(){
        return "Hola";
        //http://localhost/Slim_1/
    });

    //Con parámetros que le pasas
    //RequestParam
    $app->get("/Prueba", function($request) {
        $hola[] = $request->getParam("usuario");
        $hola[] = $request->getParam("clave");

        return $hola[0];
    });

    //Con parámetros en la url
    //PathVariable
    $app->get("/{id}", function($request) {
        $hola[] = $request->getAttribute("id");
        return $hola[0];
    });

    $app->get("/InsertarPeli", function($request) {
        $peli[] = $request->getParam("nombrePeli");
        $peli[] = $request->getParam("duracion");
        $peli[] = $request->getParam("tipoPelicula");

        $query = "INSERT INTO `peliculas` (`nombre_peli`, `duracion`, `tipo_pelicula`) 
                  VALUES (`"$peli[0]"`, `"$peli[1]"`, `"$peli[2]"`)";
        
        $resultado = mysqli_query($conex, $query);

        if ($resultado) {
            return "Todo ha salido bien";
        } else{
            return "Ups! Ha habido un error"
        }
        
    });

     

    /*
    $app->get("/Hola", function(){
        return "Hola";
    });

    http://localhost/Slim_1/index.php/Hola

    */

    //Para arrancarlo
    $app->run();

?>