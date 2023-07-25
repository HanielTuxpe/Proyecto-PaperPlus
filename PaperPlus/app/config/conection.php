<?php
    class clsconection{

        private $conection;

        private $host='localhost';
        private $DB='paperplus';
        private $user='root';
        private $psswd='';
        
        public function __construct(){
            $this->conection = new mysqli($this->host, $this->user, $this->psswd, $this->DB);
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