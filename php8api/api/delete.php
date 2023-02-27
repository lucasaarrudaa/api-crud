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
    
    $membro_linha->id = $dado->id;
    
    if($membro_linha->deleteMember()){
        echo json_encode("Membro deletado.");
    } else{
        echo json_encode("Não foi possível apagar os dados.");
    }
?>