<?php 
	
	class Public_Model{ 

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
			$prods = $connection->query($sql);
			return $prods; 
		}

		public function getAllCats()
		{
			$sql = "CALL Sp_Cons_Cats();";
			$connection = $this->dbconection->getConection();
			$result = $connection->query($sql);
			return $result;
		}

		public function SelectCat($ID)
		{
			if ($ID) {
				$sql = "CALL Sp_Get_ProdsCat($ID);";
			} else {
				$sql = "CALL Sp_Cons_Prods();";
			}

			$connection = $this->dbconection->getConection();
			$result = $connection->query($sql);
			return $result;
		}
	}
?>