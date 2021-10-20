<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../database.php';
    include_once './corretor.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Corretor($db);

    $stmt = $items->getCorretores();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $corretorArr = array();
        $corretorArr["body"] = array();
        $corretorArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
              "id" => $id, 
              "nome" => $nome, 
              "contato" => $contato, 
              "cpf" => $cpf, 
            );

            array_push($corretorArr["body"], $e);
        }
        echo json_encode($corretorArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhum registro encontrado.")
        );
    }
?>