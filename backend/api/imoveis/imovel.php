<?php
    class Imovel{

        private $conn;
        private $db_table = "imoveis";

        // Campos
        public $id;
        public $id_proprietario;
        public $id_corretor_resp;
        public $status;
        public $cep;
        public $numero;
        public $logradouro;
        public $complemento;
        public $bairro;
        public $localidade;
        public $uf;
        public $id_locatario;
        public $valor_esperado;
        public $valor_locacao;
        public $prazo_locacao;
        public $inicio_locacao;

        // Conexão com o Banco
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getImoveis(){
            $sqlQuery = "SELECT id, id_proprietario, status, cep, numero, logradouro, complemento, bairro, localidade, uf, id_locatario, id_corretor_resp, valor_esperado, valor_locacao, prazo_locacao, inicio_locacao FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createImovel(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        id_proprietario = :id_proprietario, 
                        status = :status, 
                        cep = :cep, 
                        numero = :numero, 
                        logradouro = :logradouro, 
                        complemento = :complemento, 
                        bairro = :bairro, 
                        localidade = :localidade, 
                        uf = :uf, 
                        valor_esperado = :valor_esperado,
                        id_corretor_resp = :id_corretor_resp";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // Associando dados
            $stmt->bindParam(":id_proprietario", $this->id_proprietario);
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":cep", $this->cep);
            $stmt->bindParam(":numero", $this->numero);
            $stmt->bindParam(":logradouro", $this->logradouro);
            $stmt->bindParam(":complemento", $this->complemento);
            $stmt->bindParam(":bairro", $this->bairro);
            $stmt->bindParam(":localidade", $this->localidade);
            $stmt->bindParam(":uf", $this->uf);
            $stmt->bindParam(":valor_esperado", $this->valor_esperado);
            $stmt->bindParam(":id_corretor_resp", $this->id_corretor_resp);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ individual
        public function getImovelbyId(){
            $sqlQuery = "SELECT 
            *
            /*
                    id, 
                    id_proprietario,
                    status, 
                    cep, 
                    numero,
                    logradouro, 
                    complemento, 
                    bairro, 
                    localidade, 
                    uf,
                    id_locatario, 
                    id_corretor_resp, 
                    valor_esperado, 
                    valor_locacao,
                    prazo_locacao, 
                    inicio_locacao
            */
                    FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id_proprietario = $dataRow['id_proprietario'];
            $this->status = $dataRow['status'];
            $this->cep = $dataRow['cep'];
            $this->logradouro = $dataRow['logradouro'];
            $this->valor_locacao = $dataRow['valor_locacao'];
        }        

        // UPDATE
        public function updateImovel(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                        SET
                            id_proprietario = :id_proprietario, 
                            id_locatario = :id_locatario, 
                            status = :status, 
                            cep = :cep, 
                            numero = :numero, 
                            logradouro = :logradouro, 
                            complemento = :complemento, 
                            bairro = :bairro, 
                            localidade = :localidade, 
                            uf = :uf, 
                            valor_esperado = :valor_esperado,
                            valor_locacao = :valor_locacao,
                            prazo_locacao = :prazo_locacao,
                            inicio_locacao = :inicio_locacao,
                            id_corretor_resp = :id_corretor_resp
                        WHERE 
                            id = :id";
                        

            $stmt = $this->conn->prepare($sqlQuery);

            // Associando dados
            $stmt->bindParam(":id_proprietario", $this->id_proprietario);
            $stmt->bindParam(":id_locatario", $this->id_locatario);
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":cep", $this->cep);
            $stmt->bindParam(":numero", $this->numero);
            $stmt->bindParam(":logradouro", $this->logradouro);
            $stmt->bindParam(":complemento", $this->complemento);
            $stmt->bindParam(":bairro", $this->bairro);
            $stmt->bindParam(":localidade", $this->localidade);
            $stmt->bindParam(":uf", $this->uf);
            $stmt->bindParam(":valor_esperado", $this->valor_esperado);
            $stmt->bindParam(":valor_locacao", $this->valor_locacao);
            $stmt->bindParam(":prazo_locacao", $this->prazo_locacao);
            $stmt->bindParam(":inicio_locacao", $this->inicio_locacao);
            $stmt->bindParam(":id_corretor_resp", $this->id_corretor_resp);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteImovel(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
                
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
