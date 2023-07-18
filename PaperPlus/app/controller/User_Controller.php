<?php
    session_start();
    include_once("app/models/User_Model.php");
    class User_Controller{
        private $usermodel;

        public function IndexView()
        {
            $this->usermodel = new UserModel();
            $datos =$this->usermodel->getAll();
            $vista="app/views/Access/Login.php";
            include_once("app/views/Principal/PlantillaPublic.php");
        }

        public function Login()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $usermodel=new UserModel();
                $usser = $_POST['User'];
                $pssrd = $_POST['psswd'];
                $datos=$usermodel->getAccess($usser,$pssrd);
                $usuario=$datos->fetch_object();
                if($datos->num_rows>0)
                {
                    $_SESSION['TipoUsuario']=$usuario->Tipo;
                    $_SESSION['Loged'] = true;
                    if($_SESSION['TipoUsuario'] == 'Admini')
                    {
                        $vista="app/views/Principal/Inicio.php";
                        include_once("app/views/Principal/PlantillaAdmin.php");
                    }
                    else if($_SESSION['TipoUsuario'] == 'Empleado')
                    {
                        $vista="app/views/Principal/Inicio.php";
                        include_once("app/views/Principal/PlantillaAdmin.php");
                    }
                    else if($_SESSION['TipoUsuario'] == 'Cliente')
                    {
                        $vista = "Vistas/Acceso/frmDenegado.php";
                        include_once("app/views/Principal/PlantillaPublic.php");
                    }
                }
                else
                {
                $vista="app/views/Principal/Inicio.php";
                include_once("app/views/Principal/PlantillaPublic.php");
                }
            } 
        }               

        public function RegCliview()
        {
            $vista="app/views/Access/Registro.php";
            include_once("app/views/Principal/PlantillaPublic.php");            
        }

        public function RegClient()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $Name=$_POST['txtName'];
                $APa=$_POST['txtAp'];
                $AMa=$_POST['txtAm'];
                $Ussser=$_POST['txtUser'];
                $email=$_POST['txtEmail'];
                $Numb=$_POST['txtNum'];
                $Psswd=$_POST['txtpsswd'];
            }
            $usermodel=new UserModel();
            $usermodel->AddClient($Ussser, $Psswd, $Name, $APa, $AMa, $Numb, $email);
            header("location:http://localhost/PaperPlus/?C=User_Controller&M=IndexView");
        }


        public function Regview()
        {
            if(isset($_SESSION['Loged']) && $_SESSION['Loged'] == true){
            $vista="app/views/Admin/Users/RegAdminUser.php";
            include_once("app/views/Principal/PlantillaAdmin.php");
            }
            else{
                $vista="app/views/Principal/Inicio.php";
                include_once("app/views/Principal/PlantillaAdmin.php");
            }
        }

        public function RegNewEmp()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $Name = $_POST['txtName'];
                $APa = $_POST['txtAp'];
                $AMa = $_POST['txtAm'];
                $Ussser = $_POST['txtUser'];
                $email = $_POST['txtEmail'];
                $Numb = $_POST['txtNum'];
                $RFC = $_POST['txtRFC'];
                $Psswd = $_POST['txtpsswd'];
                $Cargo = $_POST['selectCrg'];
            }
            $usermodel = new UserModel();
            $usermodel->AddUser($Name, $Ussser, $APa, $AMa, $Psswd, $Numb, $email, $RFC, $Cargo);
            header("location:http://localhost/PaperPlus/?C=User_Controller&M=Regview");
        }
        

        public function CloseSession()
        {
            session_destroy();
            $vista="app/views/Principal/Inicio.php";
            include_once("app/views/Principal/PlantillaPublic.php");
        }
    }
?>