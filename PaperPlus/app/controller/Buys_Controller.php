<?php
session_start();
include_once("app/models/Buys_Model.php");
    class Buys_Controller{
        private $vista;
        private $BuysModel;
        
        public function index()
        {
            if (isset($_SESSION['Loged']) && $_SESSION['Loged'] == true)
            {
                if ($_SESSION['TipoUsuario'] == 'Admin')
                {
                    $this->BuysModel = new Buys_Model();
                    $consulta =$this->BuysModel->getAllProds();
                    $this->BuysModel = new Buys_Model();
                    $consultaF= $this->BuysModel->getAllFab();
                    $this->BuysModel = new Buys_Model();
                    $consInv= $this->BuysModel->getInv();
                    $vista="app/views/Admin/Prods/BuysView.php";
                    include_once("app/views/Principal/PlantillaAdmin.php");
                } elseif ($_SESSION['TipoUsuario'] == 'Empleado')
                {
                    $vista = "app/views/Principal/Inicio.php";
                    include_once("app/views/Principal/PlantillaAdmin.php");
                } else {
                    $vista = "app/views/Principal/Inicio.php";
                    include_once("app/views/Principal/PlantillaPublic.php");
                }
            }
            else
            {
                $vista = "app/views/Principal/Inicio.php";
                include_once("app/views/Principal/PlantillaPublic.php");
            }
        }

        public function RegNewBuy()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $IDP = $_POST['Fabs'];
                $Date = $_POST['DtBuy'];
                $Total = $_POST['TotalC'];
                
                $BuysModel = new Buys_Model();
                $BuysModel->AddBuys($IDP, $Total, $Date);

                $numFilas = $_POST['numFilas'];

                for ($i = 0; $i < $numFilas; $i++) {
                    $Idprod = $_POST['ProdId'][$i];
                    echo $Idprod;
                    $Cant = $_POST['stock'][$i];
                    echo $Cant;
                    $Prc = $_POST['PrecioP'][$i];
                    echo $Prc;
                    $Subt = $_POST['Subtotal'][$i];
                    echo $Subt;
                    $BuysModel = new Buys_Model();
                    $BuysModel->AddDetBuys($Idprod, $Cant, $Prc, $Subt);
                }
            }
            header("location:http://localhost/PaperPlus/?C=Buys_Controller&M=Index");
        }
    }
?>