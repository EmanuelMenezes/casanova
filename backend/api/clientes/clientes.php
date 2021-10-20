<?php
    class Cliente{

        private $conn;
        private $db_table = "clientes";

        // Campos
        public $id;
        public $cpf;
        public $telefone;
        public $nome;

        // Conexão com o Banco
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getClientes(){
            $sqlQuery = "SELECT id, cpf, telefone, nome FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createCliente(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        cpf = :cpf, 
                        nome = :nome, 
                        telefone = :telefone";
       
            $stmt = $this->conn->prepare($sqlQuery);
        
            // Associando dados
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":telefone", $this->telefone);

        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ individual
        public function getClientebyId(){
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
            $this->telefone = $dataRow['telefone'];
            $this->nome = $dataRow['nome'];
        }        

        // UPDATE
        public function updateCliente(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                        SET
                            cpf = :cpf, 
                            nome = :nome, 
                            telefone = :telefone
                        WHERE 
                            id = :id";
                        

            $stmt = $this->conn->prepare($sqlQuery);

            // Associando dados
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":telefone", $this->telefone);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteCliente(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
                
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
