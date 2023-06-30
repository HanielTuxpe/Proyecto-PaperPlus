<?php
    class clsconection{

        private $conection;
        
        public function __construct(){
            require_once('./conection.php');
            $this->conection = new mysqli(DB_HOST, DB_NAME, USER, DB_PSSWD);
            if ($this->conection->connect_error) {
                die("Imposible conectarse: ".$this->conection->connect_error);
                exit();
            }
        }
        public function getConection(){
            return $this->conection;
        }
        public function closeConection(){
            $this->conection->close();
        } 
    }
?>