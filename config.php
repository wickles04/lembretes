<?php
// servidor, bd, usuario, senha
$db_servidor = 'localhost';
$db_database = 'apilembretesdb';
$db_usuario = 'Nyckoly';
$db_pwd = '12345678';

$pdo = new PDO('mysql:host='.$db_servidor.';dbname='.$db_database,$db_usuario,$db_pwd);

$array[] =[
    'error' => "",
    'result' => []
]

?>