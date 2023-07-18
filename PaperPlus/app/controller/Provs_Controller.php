<?php
    include_once("app/models/Provs_Model.php");
    class Provs_Controller{
        private $vista;
        private $ProvsModel;
        
        public function index()
        {
            $this->ProvsModel = new Provs_Model();
            $consulta =$this->ProvsModel->getAllFab();
            $vista="app/views/Admin/Provs/ProvsForm.php";
            include_once("app/views/Principal/PlantillaAdmin.php");
        }

        public function RegNew()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $Name=$_POST['txtNameProv'];;
                $email=$_POST['txtEmail'];
                $Numb=$_POST['txtNumber'];
            }
            $ProvsModel=new Provs_Model();
            $ProvsModel->AddProvs($Name, $Numb, $email);
            header("location:http://localhost/PaperPlus/?C=Provs_Controller&M=Index");
        }
        public function Delete(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $id=$_GET['id'];
            }
            $ProvsModel = new Provs_Model();
            $ProvsModel->deleteFab($id);
            header("Location:http://localhost/PaperPlus/?C=Provs_Controller&M=index");
        }
        public function Edit(){
            $ProvsModel = new Provs_Model();
            if(isset($_POST['bttnEdit']))
            {
                $id = $_POST['IdProv'];
                $Name = $_POST['txtnombre'];
                $Numb = $_POST['txttel'];
                $email = $_POST['txtemail'];
                $ProvsModel->actFab($id, $Name, $Numb, $email);
            }
            
            $consulta = $ProvsModel->getAllFab();
            header("Location:http://localhost/PaperPlus/?C=Provs_Controller&M=index");
        }
    }
?>