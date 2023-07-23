<?php
    include_once("app/models/Public_Model.php");

    class Public_Controller
    {
        private $vista;

        public function Index()
        { 
            $PublicModel = new Public_Model();
            $consultaC = $PublicModel->getAllCats();
            $PublicModel = new Public_Model();
            $consulta = $PublicModel->getAllProds();
 
            $vista = "app/views/Publicview/Catalogo.php";
            include_once("app/views/Principal/PlantillaPublic.php");
        }

        public function FiltrarCat()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['categoria'])) {
                $Catg = $_GET['categoria'];
            } else {
                $Catg = 0;
            }

            $PublicModel = new Public_Model();
            $consulta = $PublicModel->SelectCat($Catg);
            $PublicModel = new Public_Model();
            $consultaC = $PublicModel->getAllCats();
            $vista = "app/views/Publicview/Catalogo.php";
            include_once("app/views/Principal/PlantillaPublic.php");
        }
    }
?>