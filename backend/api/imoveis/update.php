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

    $data = json_decode(file_get_contents("php://input"));

    $item->id = $data->id; 
    $item->id_proprietario = $data->id_proprietario; 
    $item->id_locatario = $data->id_locatario; 
    $item->status = $data->status; 
    $item->cep = $data->cep; 
    $item->numero = $data->numero; 
    $item->logradouro = $data->logradouro; 
    $item->complemento = $data->complemento; 
    $item->bairro = $data->bairro; 
    $item->localidade = $data->localidade; 
    $item->uf = $data->uf; 
    $item->valor_esperado = $data->valor_esperado;
    $item->valor_locacao = $data->valor_locacao;
    $item->prazo_locacao = $data->prazo_locacao;
    $item->inicio_locacao = $data->inicio_locacao;
    $item->id_corretor_resp = $data->id_corretor_resp;
    
    if($item->updateImovel()){
        echo 'Imóvel atualizado com sucesso.';
    } else{
        echo 'Não foi possível atualizar o imóvel';
    }
?>