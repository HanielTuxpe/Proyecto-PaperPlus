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

		public function getAllProds()
		{
			$sql = "CALL Sp_Cons_Prods();";
			$connection = $this->dbconection->getConection();
			$result = $connection->query($sql);
			$prods = array();
			if ($result !== false && $result->num_rows > 0) {
				while ($row = $result->fetch_object()) {
					$prods[] = $row;
				}
			}
			return $prods; 
		}
		
		public function getInv()
		{
			$sql = "CALL Sp_Cons_Inv();";
			$connection = $this->dbconection->getConection();
			$result = $connection->query($sql);
			$prods = array();
			if ($result !== false && $result->num_rows > 0) {
				while ($row = $result->fetch_object()) {
					$prods[] = $row;
				}
			}
			return $prods; 
		}

		public function AddBuys($IDP, $Total, $Date)
		{
			$sql= "CALL Sp_Add_Buys('$IDP', '$Total', '$Date');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
		}

		public function AddDetBuys($Idprod, $Cant, $Prc, $Subt)
		{
			$sql= "CALL Sp_Add_DetBuy('$Idprod', '$Cant', '$Prc', '$Subt');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
		}
	}
?>