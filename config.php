<?php


define("HOST",'localhost');
define("USER",'root');
define("PASS",'1234');
define("BASE",'cadastro');
define("PORT",'3306');


$conn = new mysqli(HOST, USER, PASS, BASE,PORT);


if($conn->connect_errno){
    echo "Erro Banco de dados: {$db->connect_error}";    
    exit();
}



