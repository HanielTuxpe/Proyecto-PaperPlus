<?php
    class IndexController{
        private $vista;
        
        public function index()
        {
            $vista="views/Inicio.php";
            include_once("views/Plantilla.php");
        }
    }
?>