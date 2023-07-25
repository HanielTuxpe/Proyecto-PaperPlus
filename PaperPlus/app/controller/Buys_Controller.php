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
                }else if ($_SESSION['TipoUsuario'] == 'Empleado')
                {
                    $vista = "app/views/Access/DenyView.php";
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
                    $Idprod = isset($_POST['ProdId'][$i]) ? $_POST['ProdId'][$i] : null;
                    $Cant = isset($_POST['stock'][$i]) ? $_POST['stock'][$i] : null;
                    $Prc = isset($_POST['PrecioP'][$i]) ? $_POST['PrecioP'][$i] : null;
                    $Subt = isset($_POST['Subtotal'][$i]) ? $_POST['Subtotal'][$i] : null;
                
                    if ($Idprod !== null && $Cant !== null && $Prc !== null && $Subt !== null) {
                        $BuysModel = new Buys_Model();
                        $BuysModel->AddDetBuys($Idprod, $Cant, $Prc, $Subt);
                    }
                }                              
            }
            header("location:/PaperPlus/?C=Buys_Controller&M=Index");
        }
    }
?>