<?php

require('./../config.php');

$metodo=strtoupper($_SERVER['REQUEST_METHOD']);

if ($metodo==='GET') {
    $sql=$pdo->query("SELECT * FROM lembrete");

    if ($sql->rowCount()>0) {

        $dados=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {
            $array['result']=[
                'id'=> $linha['idlembrete'],
                'titulo'=>$linha['tituloLembrete']
            ];

        }    
    }
    else{ 
        $array['error'] = 'Erro: Não há lembretes';
    }
} else { 
    $array['error'] = 'Erro: Ação inválida método permitido apenas get';
}
require('./../return.php');


?>