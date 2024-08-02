<?php

require('./../config.php');

$metodo=strtoupper($_SERVER['REQUEST_METHOD']);

if ($metodo==='GET') {
    //selecionar tudo da tabela lembrete
    $sql=$pdo->query("SELECT * FROM lembrete");

    // se o número de linhas do sql for maior que 0, vai executar
    if ($sql->rowCount()>0) {

        // pegando tudo do sql e colocando na variável dados
        //fetch_assoc: ler o array de forma associativa (CHAVE=VALOR)
        $dados=$sql->fetchAll(PDO::FETCH_ASSOC);

        var_dump($dados);

        //indo na variável dados e pegando as linhas
        foreach ($dados as $linha) {
            $array['result'][]=[
                // entrando na coluna especificada e colocando em uma variável
                'id'=> $linha['idLembrete'],
                'titulo'=>$linha['tituloLembrete']
            ];

        }    
    }
    //se o número de linhas não for maior que zero, mostrar mensagem de erro
    else{ 
        $array['error'] = 'Erro: Não há lembretes';
    }
} else { 
    $array['error'] = 'Erro: Ação inválida método permitido apenas get';
}
require('./../return.php');


?>