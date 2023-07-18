<?php
    define("controlador","app/controller/");

    $control=isset($_GET['C'])?$_GET['C']:'';

    $ruta=controlador.$control.'.php';


    if(file_exists($ruta) && !empty($control)){
        require_once($ruta); 
        $objeto=new $control();

        $metodo=isset($_GET['M'])?$_GET['M']:'';

        if(method_exists($objeto,$metodo) && !empty($metodo)){
            $objeto->$metodo();
        }
    }else{
        require_once("app/controller/Index_Controller.php");
        $default=new Index_Controller();
        $default->Index();
    }
?>