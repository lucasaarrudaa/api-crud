<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/db_connection.php';
    include_once '../class/members.php';
    $db_connection = new Database();
    $db = $db_connection->getConnection();
    $membro_linhas = new Membro($db);
    $stmt = $membro_linhas->getMembers();
    $membro_linhaCount = $stmt->rowCount();
    echo json_encode($membro_linhaCount);
    if($membro_linhaCount > 0){
        
        $membroArray = array();
        $membroArray["body"] = array();
        $membroArray["member_rowCount"] = $membro_linhaCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nome_membro" => $nome_membro,
                "email_end" => $email_end,
                "idade" => $idade,
                "cargo" => $cargo,
                "data_entrada" => $data_entrada
            );
            array_push($membroArray["body"], $e);
        }
        echo json_encode($membroArray);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhum registro encontrado.")
        );
    }
?>