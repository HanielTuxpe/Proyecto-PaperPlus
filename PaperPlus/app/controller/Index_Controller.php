<?php
    class Index_Controller{
        private $vista;
        
        public function index()
        {
            $vista="app/views/Principal/Inicio.php";
            include_once("app/views/Principal/PlantillaPublic.php");
        }
        public function IndexAdmin()
        {
            $vista="app/views/Principal/Inicio.php";
            include_once("app/views/Principal/PlantillaAdmin.php");
        }
        
    }
?>