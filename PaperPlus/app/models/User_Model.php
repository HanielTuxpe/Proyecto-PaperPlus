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
			$result = $conection->query($sql);
			$users = array();
			while($rows = $result -> fetch_assoc()){
				$users[]= $rows;
			}
			$this->dbconection->closeConection();	
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
	} 
?>