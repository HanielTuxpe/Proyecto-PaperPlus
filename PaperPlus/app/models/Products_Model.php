<?php
	class Prods_Model{ 

		private $dbconection;
		public function __construct(){
			require_once("app/config/conection.php");
			$this->dbconection = new clsconection();
			$this->dbconection->getConection();
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

		public function AddProds($Name, $Dsc, $PrV, $Cod_Cat, $Cod_M, $img)
		{
			$sql= "CALL Sp_Add_Product('$Name', '$Dsc', '$PrV', '$Cod_Cat', '$Cod_M', '$img');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
		}

		public function getAllCats()
		{
			$sql = "CALL Sp_Cons_Cats();";
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

		public function getAllMarks()
		{
			$sql = "CALL Sp_Cons_Marca();";
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

		public function ActProds($id, $Name, $Dsc, $PrV, $Cod_Cat, $Cod_M, $img) {
			$sql = "CALL Sp_Alt_Prods('$id', '$Name', '$Dsc', '$PrV', '$Cod_Cat', '$Cod_M', '$img');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			if ($result === true) {
				return true;
			} else {
				return false;
			}
			$this->dbconection->closeConection();
		}
		
		
		public function delProd($ID)
		{
			$sql= "CALL Sp_Del_Product('$ID');";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$this->dbconection->closeConection();	
			return $result;
		}

		public function getById($Id)
		{
			$sql = "CALL Sp_GetProd_Id('$Id');";
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
	}
?>