<?php 
	
	class UserModel{
		private $dbconection;

		public function __construct(){
			require_once("../config/conection.php");
			$this->dbconection = new clsconection();
		} 

		public function getAll(){
			$sql = "CALL Sp_Cons_Users";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$users = array();
			while($rows = $result -> fetch_assoc()){
				$users[]= $rows;
			}
			$this->dbconection->closeConection();	
			return $users;
		}
		public function getAccess($user, $password){
			$sql = "CALL Sp_Get_Acces('$user', '$password');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			if($result && $result->num_rows>0){
				$user = $result->fetch_assoc();
			}else{
				$user=false;
			}
			$this->dbconection->closeConection();	
			return $user;
		}
		public function AddUser($NameC, $usser, $APatern, $AMatern, $psswd, $Number, $email, $RFCC, $CRUP, $cargo)
		{
    		$sql = "CALL Sp_Add_User('$NameC', '$usser', '$APatern', '$AMatern', '$psswd', '$Number', '$email','$RFCC', '$CRUP', '$cargo');";
    		$conection = $this->dbconection->getConection();
    		$result = $conection->query($sql);
        	$this->dbconection->closeConection();
        	return $result;
		}
		public function getAccessCliente($user, $password){
			$sql = "CALL Sp_Access_Client('$user', '$password');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			if($result && $result->num_rows>0){
				$user = $result->fetch_assoc();
			}else{
				$user=false;
			}
			$this->dbconection->closeConection();	
			return $user;
		}
		public function AddClient($usser, $Psswrd, $NameC, $APatern, $AMatern, $Number, $correo)
		{
    		$sql = "CALL Sp_Add_Client('$usser', '$Psswrd', '$NameC', '$APatern', '$AMatern', '$Number', '$correo')";
    		$conection = $this->dbconection->getConection();
    		$result = $conection->query($sql);
        	$this->dbconection->closeConection();
        	return $result;
		}
	} 
?>