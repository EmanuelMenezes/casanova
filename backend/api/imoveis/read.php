<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../database.php';
    include_once './imovel.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Imovel($db);

    $stmt = $items->getImoveis();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $imovelArr = array();
        $imovelArr["body"] = array();
        $imovelArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
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

            array_push($imovelArr["body"], $e);
        }
        echo json_encode($imovelArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhum registro encontrado.")
        );
    }
?>