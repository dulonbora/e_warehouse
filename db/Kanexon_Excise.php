<?php
    class dbconnnect{
        private $conn = null;
        
        private $hostname="127.0.0.1";
        private $username="assamexcise";
        private $password="exercise123#";
        public function getDb(){
                //$this->conn = new PDO("mysql:host=$this->hostname;dbname=assamexcise",  $this->username, $this->password);
                $this->conn = new PDO("mysql:host=localhost;dbname=assamexcise",  $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("set names utf8");
                return $this->conn;
        }

}?>	
	
