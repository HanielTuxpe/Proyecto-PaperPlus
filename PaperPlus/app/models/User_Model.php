<?php 
	
	class UserModel{
		private $dbconection;
		public function __construct(){
			require_once("app/config/conection.php");
			$this->dbconection = new clsconection();
			$this->dbconection->getConection();
		}

		public function getAll(){
			$sql = "CALL Sp_Cons_Users";
			$conection = $this->dbconection->getConection();
			$users = $conection->query($sql);
			return $users;
		}
		public function getAccess($user, $password){
			$sql = "CALL Sp_Get_Access('$user', '$password');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
		}
		public function AddUser($NameC, $usser, $APatern, $AMatern, $psswd, $Number, $email, $RFCC, $cargo)
		{
			$sql = "CALL Sp_Add_User('$NameC', '$usser', '$APatern', '$AMatern', '$psswd', '$Number', '$email', '$RFCC', '$cargo');";
			$conection = $this->dbconection->getConection();			
			$result = $conection->query($sql);
			$this->dbconection->closeConection();
			return $result;
		}
		public function AddClient($usser, $Psswrd, $NameC, $APatern, $AMatern, $Number, $correo)
		{
    		$sql = "CALL Sp_Add_Client('$usser', '$Psswrd', '$NameC', '$APatern', '$AMatern', '$Number', '$correo')";
    		$conection = $this->dbconection->getConection();
    		$result = $conection->query($sql);
        	$this->dbconection->closeConection();
        	return $result;
		}

		public function EditUser($NameC, $usser, $Number, $email, $cargo, $id)
		{
			$sql = "CALL Sp_Alt_UserE('$NameC', '$usser', '$Number', '$email', '$cargo', '$id');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();
			return $result;
		}

		public function ConsTipo()
		{
			$sql = "CALL Sp_Cons_tpo();";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$Tipo = array();
			if ($result !== false && $result->num_rows > 0) {
				while ($row = $result->fetch_object()) {
					$Tipo[] = $row;
				}
			}
			return $Tipo;
		}

		public function DelUser($ID)
		{
			$sql = "CALL Sp_Del_UserE('$ID');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();
			return $result;
		}
	} 
?>