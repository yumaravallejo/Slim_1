<?php 
    require __DIR__.'/Slim/autoload.php'

    $app = new \Slim\App //Objeto que tiene todos los endpoints que podemos hacer

    // -> Para coger cosas de un objeto
    $app->get("/", function(){
        return "Hola";
    })

    //Para arrancarlo
    $app->run();

?>