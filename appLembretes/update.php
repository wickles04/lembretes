<?php

require('./../config.php');

$metodo=strtoupper($_SERVER['REQUEST_METHOD']);

if ($metodo ==='PUT'){

    parse_str(file_get_contents("php://input"),$put);

    $id = $put['id'] ?? null;
    $titulo = $put['titulo'] ?? null;
    $corpo = $put['corpo'] ?? null;


    $id = filter_var($id,FILTER_VALIDATE_INT);
    $titulo = filter_var($titulo,FILTER_SANITIZE_STRING);
    $corpo = filter_var($corpo,FILTER_SANITIZE_STRING);

    if ($id && $titulo && $corpo){
        $sql = $pdo->prepare("SELECT * FROM lembrete WHERE idLembrete=:id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount()>0) { 
            $sql $pdo->prepare("UPDATE lembrete SET corpoLembrete = :corpo tituloLembrete = :titulo" WHERE idLembrete = :id);

            $sql->bindValue(":id", $id);
            $sql->bindValue(":titulo", $titulo);
            $sql->bindValue(":corpo", $corpo);
            $sql->execute();

            $array['result']='Item atualizado com sucesso!';

        }
        else { 
            $array['error'] 'Erro: Id Inexistente!';
        }

    
    }else { 
        $array[error] 'Erro: parametro nulo ou inválido!';
    }  


}else{
    $array['error'] = 'Erro: Ação invalida - Método permitido apenas PUT';
}   

require('./../return.php');


?>