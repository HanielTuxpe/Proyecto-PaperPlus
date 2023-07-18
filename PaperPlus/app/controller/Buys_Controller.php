<?php
include_once("app/models/Buys_Model.php");
    class Buys_Controller{
        private $vista;
        
        public function index()
        {
            $vista="app/views/Admin/Prods/Buys.php";
            include_once("app/views/Principal/PlantillaAdmin.php");
        
            $this->ProdsModel = new Prods_Model();
            $consulta =$this->ProdsModel->getAllProds();
            $this->ProdsModel = new Prods_Model();
            $consultaCat= $this->ProdsModel->getAllCats();
            $this->ProdsModel = new Prods_Model();
            $consultaM= $this->ProdsModel->getAllMarks();
        }
        public function RegNew()
        {
            if(!empty($_POST))
            {
                $Name=$_POST['txtProd'];
                $Dsc=$_POST['txtDsc'];
                $PrV=$_POST['txtPrv'];
                $Cod_Cat=$_POST['ProdCat'];
                $Cod_M=$_POST['ProdMark'];  
                $ProdsModel = new Prods_Model();
                $ProdsModel->AddProds($Name, $Dsc, $PrV, $Cod_Cat, $Cod_M, $img);
                header("Location:http://localhost/PaperPlus/?C=Prods_Controller&M=index");
            }
        }
        public function Delete(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $id=$_GET['id'];
            }
            $ProdsModel = new Prods_Model();
            $ProdsModel->delProd($id);
            header("Location:http://localhost/PaperPlus/?C=Prods_Controller&M=index");
        }
        
        public function Edit() {
            $ProdsModel = new Prods_Model();
        
            if(isset($_POST['bttnEdit'])) {
                $id = $_POST['IdProd'];
                $Name = $_POST['txtnombre'];
                $Dsc = $_POST['txtdsc'];
                $PrV = $_POST['txtPV'];
                $Cod_Cat = $_POST['cat'];
                $Cod_M = $_POST['marca'];
                $img = $_POST['img'];
                $ProdsModel = new Prods_Model();
                $ProdsModel->ActProds($id, $Name, $Dsc, $PrV, $Cod_Cat, $Cod_M, $img);
            }
            $consulta = $ProdsModel->getAllProds();
            header("Location:http://localhost/PaperPlus/?C=Prods_Controller&M=index");
        } 
    }
?>