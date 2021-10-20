<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../database.php';
    include_once './corretor.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Corretor($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->id = $data->id; 
    $item->cpf = $data->cpf; 
    $item->nome = $data->nome; 
    $item->contato = $data->contato; 

    
    if($item->updateCorretor()){
        echo 'Corretor atualizado com sucesso.';
    } else{
        echo 'Não foi possível atualizar o corretor';
    }
?>