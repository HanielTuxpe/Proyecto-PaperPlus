<?php
    session_start();
    include_once("app/models/User_Model.php");
    class User_Controller{
        private $usermodel;

        public function IndexView()
        {
            $this->usermodel = new UserModel();
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
                    if($_SESSION['TipoUsuario'] == 'Admin')
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
                        $vista="app/views/Principal/Inicio.php";
                        include_once("app/views/Principal/PlantillaClient.php");
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
            header("location:/PaperPlus/?C=User_Controller&M=IndexView");
        }

        public function RegView()
        {
            if (isset($_SESSION['Loged']) && $_SESSION['Loged'] == true)
            {
                if ($_SESSION['TipoUsuario'] == 'Admin')
                {
                    $usermodel = new UserModel();
                    $datos = $usermodel->getAll();
                    $usermodel = new UserModel();
                    $datostpo = $usermodel->ConsTipo();
                    $vista="app/views/Admin/Users/RegAdminUser.php";
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

        public function RegNewEmp()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $NameC=$_POST['txtName'];
                $APatern=$_POST['txtAp'];
                $AMatern=$_POST['txtAm'];
                $usser=$_POST['txtUser'];
                $email=$_POST['txtEmail'];
                $Number=$_POST['txtNum'];
                $psswd=$_POST['txtpsswd'];
                $RFCC = $_POST['txtRFC'];
                $cargo = $_POST['selectCrg'];
            }
            $usermodel = new UserModel();
            $usermodel->AddUser($NameC, $usser, $APatern, $AMatern, $psswd, $Number, $email, $RFCC, $cargo);
            header("location:/PaperPlus/?C=User_Controller&M=Regview");
        }
        

        public function CloseSession()
        {
            session_destroy();
            $vista="app/views/Principal/Inicio.php";
            include_once("app/views/Principal/PlantillaPublic.php");
        }

        public function EditxDel() {
            $usermodel = new UserModel();
        
            if(isset($_POST['bttnEdit'])) {
                $id = $_POST['IdUsser'];
                $NameC = $_POST['txtnombre'];
                $usser = $_POST['txtusser'];
                $Number = $_POST['txttel'];
                $email = $_POST['txtemail'];
                $cargo = $_POST['cargo'];
                $usermodel = new UserModel();
                $usermodel->EditUser($NameC, $usser, $Number, $email, $cargo, $id);
            }
            else if(isset($_POST['bttnDel'])){
                $id = $_POST['IdUsser'];

                $usermodel = new UserModel();
                $usermodel->DelUser($id);
            }
            $usermodel = new UserModel();
            $consulta = $usermodel->getAll();
            header("Location:/PaperPlus/?C=User_Controller&M=Regview");
        }
}
?>