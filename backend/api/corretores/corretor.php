<?php
    class Corretor{

        private $conn;
        private $db_table = "corretores";

        // Campos
        public $id;
        public $cpf;
        public $contato;
        public $nome;

        // Conexão com o Banco
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getCorretores(){
            $sqlQuery = "SELECT id, cpf, contato, nome FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createCorretor(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        cpf = :cpf, 
                        nome = :nome, 
                        contato = :contato";
       
            $stmt = $this->conn->prepare($sqlQuery);
        
            // Associando dados
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":contato", $this->contato);

        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ individual
        public function getCorretorbyId(){
            $sqlQuery = "SELECT 
                        *
                    FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->cpf = $dataRow['cpf'];
            $this->contato = $dataRow['contato'];
            $this->nome = $dataRow['nome'];
        }        

        // UPDATE
        public function updateCorretor(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                        SET
                            cpf = :cpf, 
                            nome = :nome, 
                            contato = :contato
                        WHERE 
                            id = :id";
                        

            $stmt = $this->conn->prepare($sqlQuery);

            // Associando dados
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":contato", $this->contato);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteCorretor(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
                
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
