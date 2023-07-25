<?php
    session_start();
    include_once("app/models/Products_Model.php");
    class Prods_Controller{
        private $vista;
        private $ProdsModel;

        public function index()
        {
            if (isset($_SESSION['Loged']) && $_SESSION['Loged'] == true)
            {
                if ($_SESSION['TipoUsuario'] == 'Admin')
                {
                    $this->ProdsModel = new Prods_Model();
                    $consulta =$this->ProdsModel->getAllProds();
                    $this->ProdsModel = new Prods_Model();
                    $consultaCat= $this->ProdsModel->getAllCats();
                    $this->ProdsModel = new Prods_Model();
                    $consultaM= $this->ProdsModel->getAllMarks();
                    $vista="app/views/Admin/Prods/ProdsView.php";
                    include_once("app/views/Principal/PlantillaAdmin.php");
                } elseif ($_SESSION['TipoUsuario'] == 'Empleado')
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

        public function RegNew()
        {
            if(!empty($_POST))
            {
                $Name=$_POST['txtProd'];
                $Dsc=$_POST['txtDsc'];
                $PrV=$_POST['txtPrv'];
                $Cod_Cat=$_POST['ProdCat'];
                $Cod_M=$_POST['ProdMark'];
                if(isset($_FILES['imgProd'])&& $_FILES['imgProd']['error']===UPLOAD_ERR_OK){
                    $Nameimg=$_FILES['imgProd']['name'];
                    $tipoArchivo=$_FILES['imgProd']['type'];
                    $whimg=$_FILES['imgProd']['size'];
                    $rutaTemp=$_FILES['imgProd']['tmp_name'];
                    $extenciones=array('jpeg','jpg','png','webp');
                    $extencion=pathinfo($Nameimg,PATHINFO_EXTENSION);
                    if(!in_array($extencion,$extenciones)){
                        echo "la imagen no tiene un formato aceptado en el servidor";
                        exit;
                    }                
                    $maxwh=3*1024*1024;
                    if($whimg>$maxwh){
                        echo "ya mejor sube una pelicula o una lona NMms";
                        exit;
                    }
                    $Nameimg=uniqid('imgProd_').'.'.$extencion;
                    $ruta="app/SRC/prodimg/".$Nameimg;
                    if(!move_uploaded_file($rutaTemp,$ruta)){
                        echo "Error al cargar la imagen a la ruta destino";
                        exit;
                    }
                    $img = $Nameimg;
    
                }    
                $ProdsModel = new Prods_Model();
                $ProdsModel->AddProds($Name, $Dsc, $PrV, $Cod_Cat, $Cod_M, $img);
                header("Location:/PaperPlus/?C=Prods_Controller&M=index");
            }
        }
        
        public function EditxDel() {
            $ProdsModel = new Prods_Model();
        
            if(isset($_POST['bttnEdit'])) {
                $id = $_POST['IdProd'];
                $Name = $_POST['txtnombre'];
                $Dsc = $_POST['txtdsc'];
                $PrV = $_POST['txtPV'];
                $Cod_Cat = $_POST['cat'];
                $Cod_M = $_POST['marca'];
                $img = $_POST['img'];
                if(isset($_FILES['imgprod']) && $_FILES['imgprod']['error'] === UPLOAD_ERR_OK) {
                    $Nameimg = $_FILES['imgprod']['name'];
                    $tipoArchivo = $_FILES['imgprod']['type'];
                    $whimg = $_FILES['imgprod']['size'];
                    $rutaTemp = $_FILES['imgprod']['tmp_name'];
                    $extenciones = array('jpeg', 'jpg', 'png', 'gif');
                    $extencion = pathinfo($Nameimg, PATHINFO_EXTENSION);
                    if(!in_array($extencion, $extenciones)){
                        echo "La imagen no tiene un formato aceptado en el servidor";
                        exit;
                    }                
                    $maxwh = 2 * 1024 * 1024;
                    if($whimg > $maxwh) {
                        echo "La imagen es demasiado grande. Por favor, elige una imagen más pequeña";
                        exit;
                    }
                    $Nameimg = uniqid('imgProd_').'.'.$extencion;
                    $ruta = "app/SRC/prodimg/".$Nameimg;
                    if(!move_uploaded_file($rutaTemp, $ruta)){
                        echo "Error al cargar la imagen a la ruta destino";
                        exit;
                    }
                    unlink("app/SRC/prodimg/" . $_POST['img']);                    
                    $img = $Nameimg;
                }
                else{
                    $img = $_POST['img'];
                }
                $ProdsModel = new Prods_Model();
                $ProdsModel->ActProds($id, $Name, $Dsc, $PrV, $Cod_Cat, $Cod_M, $img);
            }
            else if(isset($_POST['bttnDel'])){
                $id = $_POST['IdProd'];
                $img = $_POST['img'];

                $img = unlink("app/SRC/prodimg/" . $_POST['img']);                    

                $ProdsModel = new Prods_Model();
                $ProdsModel->delProd($id);
            }
            $ProdsModel = new Prods_Model();
            $consulta = $ProdsModel->getAllProds();
            header("Location:/PaperPlus/?C=Prods_Controller&M=index");
        }        
    }
?>