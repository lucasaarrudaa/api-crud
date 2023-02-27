<?php 
    class Database {
        private $host = "localhost";
        private $database_name = "apiphp";
        private $username = "root";
        private $password = "884316";
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Não foi possível conectar ao banco de dados: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>
