<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../database.php';
    include_once './imovel.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Imovel($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getImovelbyId();

    if($item->name != null){
        // create array
        $imovel_arr = array(
            "id" => $id, 
            "id_proprietario" => $id_proprietario, 
            "id_locatario" => $id_locatario, 
            "status" => $status, 
            "cep" => $cep, 
            "numero" => $numero, 
            "logradouro" => $logradouro, 
            "complemento" => $complemento, 
            "bairro" => $bairro, 
            "localidade" => $localidade, 
            "uf" => $uf, 
            "valor_esperado" => $valor_esperado,
            "valor_locacao" => $valor_locacao,
            "prazo_locacao" => $prazo_locacao,
            "inicio_locacao" => $inicio_locacao,
            "id_corretor_resp" => $id_corretor_resp
        );
      
        http_response_code(200);
        echo json_encode($imovel_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Imóvel não encontrado.");
    }
?>