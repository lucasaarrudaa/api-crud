<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/db_connection.php';
    include_once '../class/members.php';
    $db_connection = new Database();
    $db = $db_connection->getConnection();
    $membro_linha = new Membro($db);
    $membro_linha->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $membro_linha->getSingleMember();
    if($membro_linha->nome_membro != null){
        // fazendo array
        $membr_array = array(
            "id" =>  $membro_linha->id,
            "nome_membro" => $membro_linha->nome_membro,
            "email_end" => $membro_linha->email_end,
            "idade" => $membro_linha->idade,
            "cargo" => $membro_linha->cargo,
            "data_entrada" => $membro_linha->data_entrada
        );
      
        http_response_code(200);
        echo json_encode($membr_array);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Member not found.");
    }
?>