<?php
    class Membro{
        private $conn;
        private $db_table = "Membro";
        public $id;
        public $nome_membro;
        public $email_end;
        public $idade;
        public $cargo;
        public $data_entrada;
        public function __construct($db){
            $this->conn = $db;
        }
        public function getMembers(){
            $sqlQuery = "SELECT id, nome_membro, email_end, idade, cargo, data_entrada FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        public function createMember(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nome_membro = :nome_membro, 
                        email_end = :email_end, 
                        idade = :idade, 
                        cargo = :cargo, 
                        data_entrada = :data_entrada";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nome_membro=htmlspecialchars(strip_tags($this->nome_membro));
            $this->email_end=htmlspecialchars(strip_tags($this->email_end));
            $this->idade=htmlspecialchars(strip_tags($this->idade));
            $this->cargo=htmlspecialchars(strip_tags($this->cargo));
            $this->data_entrada=htmlspecialchars(strip_tags($this->data_entrada));
        
            $stmt->bindParam(":nome_membro", $this->nome_membro);
            $stmt->bindParam(":email_end", $this->email_end);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->bindParam(":cargo", $this->cargo);
            $stmt->bindParam(":data_entrada", $this->data_entrada);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        public function getSingleMember(){
            $sqlQuery = "SELECT
                        id, 
                        nome_membro, 
                        email_end, 
                        idade, 
                        cargo, 
                        data_entrada
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dadoLinha = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nome_membro = $dadoLinha['nome_membro'];
            $this->email_end = $dadoLinha['email_end'];
            $this->idade = $dadoLinha['idade'];
            $this->cargo = $dadoLinha['cargo'];
            $this->data_entrada = $dadoLinha['data_entrada'];
        }        
        public function updateMember(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nome_membro = :nome_membro, 
                        email_end = :email_end, 
                        idade = :idade, 
                        cargo = :cargo, 
                        data_entrada = :data_entrada
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nome_membro=htmlspecialchars(strip_tags($this->nome_membro));
            $this->email_end=htmlspecialchars(strip_tags($this->email_end));
            $this->idade=htmlspecialchars(strip_tags($this->idade));
            $this->cargo=htmlspecialchars(strip_tags($this->cargo));
            $this->data_entrada=htmlspecialchars(strip_tags($this->data_entrada));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(":nome_membro", $this->nome_membro);
            $stmt->bindParam(":email_end", $this->email_end);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->bindParam(":cargo", $this->cargo);
            $stmt->bindParam(":data_entrada", $this->data_entrada);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        function deleteMember(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>