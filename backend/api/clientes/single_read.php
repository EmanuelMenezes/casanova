<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../database.php';
    include_once './cliente.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Cliente($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getClientebyId();

    if($item->nome != null){
        // create array
        $cliente_arr = array(
            "id" => $id, 
            "nome" => $nome, 
            "telefone" => $telefone, 
            "cpf" => $cpf
        );
      
        http_response_code(200);
        echo json_encode($cliente_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Registro nao encontrado.");
    }
?>