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
    $dado = json_decode(file_get_contents("php://input"));

    $membro_linha->nome_membro = $dado->nome_membro;
    $membro_linha->email_end = $dado->email_end;
    $membro_linha->idade = $dado->idade;
    $membro_linha->cargo = $dado->cargo;
    $membro_linha->data_entrada = date('Y-m-d H:i:s');
    
    if($membro_linha->createMember()){
        echo 'Membro inserido com sucesso.';
    } else{
        echo 'Membro não pode ser inserido.';
    }
?>