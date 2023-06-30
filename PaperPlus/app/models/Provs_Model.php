<?php 
	
	class UserModel{ 

		private $dbconection;
		public function __construct(){
			require_once("/config/conection.php");
			$this->dbconection = new clsconection();
		}

		public function getAllFab(){
			$sql = "CALL Sp_Cons_Provs();";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$fabs = array();
			while($rows = $result -> fetch_assoc()){
				$fabs[]= $rows;
			}
			$this->dbconection->closeConection();	
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
		
		public function actualizarFab($ID, $Name, $Numero, $correo)
		{
			$sql= "CALL Sp_Alt_Provs('$Name', '$Numero','$correo','$ID');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
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