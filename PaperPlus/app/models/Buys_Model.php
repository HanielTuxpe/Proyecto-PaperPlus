<?php 
	
	class Buys_Model{ 

		private $dbconection;
		public function __construct(){
			require_once("app/config/conection.php");
			$this->dbconection = new clsconection();
			$this->dbconection->getConection();
		}

		public function getAllFab()
		{
			$sql = "CALL Sp_Cons_Provs();";
			$connection = $this->dbconection->getConection();
			$result = $connection->query($sql);
			$fabs = array();
			if ($result !== false && $result->num_rows > 0) {
				while ($row = $result->fetch_object()) {
					$fabs[] = $row;
				}
			}
			return $fabs; 
		}

		public function AddProvs($Name, $Numero, $correo)
		{
			$sql= "CALL Sp_Add_Fab('$Name', '$Numero','$correo');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
		}
		
		public function actFab($ID, $Name, $Numero, $correo)
		{
			$sql= "CALL Sp_Alt_Provs('$ID','$Name', '$Numero','$correo');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			if ($result === true) {
				return true;
			} else {
				return false;
			}
			$this->dbconection->closeConection();	
		}
		
		public function deleteFab($ID)
		{
			$sql= "CALL Sp_Del_Fab('$ID');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
		}
	}
?>