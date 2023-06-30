<?php
	
		class UserModel{ 

		private $dbconection;
		public function __construct(){
			require_once("/config/conection.php");
			$this->dbconection = new clsconection();
		}

		public function getAllProds(){
			$sql = "CAll Sp_Cons_Prods();";
			$conection = $this->dbconection->getConection();
			$result = $conection->query($sql);
			$prods = array();
			while($rows = $result -> fetch_assoc()){
				$prods[]= $rows;
			}
			
			$this->dbconection->closeConection();	
			return $prods; 
		}
	}
?>