<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Idade: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/db_connection.php';
    include_once '../class/members.php';
    
    $db_connection = new Database();
    $db = $db_connection->getConnection();
    
    $membro_linha = new Membro($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $membro_linha->id = $data->id;
    
    // valores membro
    $membro_linha->nome_membro = $data->nome_membro;
    $membro_linha->email_end = $data->email_end;
    $membro_linha->idade = $data->idade;
    $membro_linha->cargo = $data->cargo;
    $membro_linha->data_entrada = date('Y-m-d H:i:s');
    
    if($membro_linha->updateMember()){
        echo json_encode("Os dados foram atualizados com sucesso.");
    } else{
        echo json_encode("Não foi possível atualizar os dados.");
    }
?>