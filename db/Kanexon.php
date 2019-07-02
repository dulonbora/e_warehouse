<?php
    class Kanexon{
        private $conn = null;
        
        private $hostname="localhost";
        private $username="warehouse";
        private $password="assamexcise@1234";
        public function getDb(){
                $this->conn = new PDO("mysql:host=$this->hostname;dbname=warehouse;charset=utf8",  $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                return $this->conn;
        }


}?>