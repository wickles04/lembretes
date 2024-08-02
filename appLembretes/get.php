<?php

require('./../config.php');

$metodo=strtoupper($_SERVER['REQUEST_METHOD']);

if ($metodo==='GET') {

    //filtrando se o parametro passado é um número inteiro, caso não seja, o valor "false" vai ser guardado na variável
    $id=filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if($id){

        // select * from lembrete where idlembrete=?
        $sql=$pdo->prepare("SELECT * FROM lembrete WHERE idLembrete=:id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            //existe o id

            // pegando tudo do sql e colocando na variável dados
            //fetch_assoc: ler o array de forma associativa (CHAVE=VALOR)
            $dadoDoLembrete=$sql->fetch(PDO::FETCH_ASSOC);

            $array['result']=[
                // entrando na coluna especificada e colocando em uma variável
                'id'=> $dadoDoLembrete['idLembrete'],
                'titulo'=> $dadoDoLembrete['tituloLembrete'],
                'corpo'=> $dadoDoLembrete['corpoLembrete']
            ];
 
        }
        else{
            $array['error'] = 'Errro: Id Inexistente!';
        }
    }
    else{
        $array['error'] = 'Erro: Número de id inválido!'
    }

} else { 
    $array['error'] = 'Erro: Ação inválida método permitido apenas get';
}
require('./../return.php');


?>