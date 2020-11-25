<?php
require_once('config.php');
session_start();
// if(!isset($_POST['name']) || !isset($_POST['cpf'] )|| !isset($_POST['telefone'])|| !isset($_POST['dataNasc'])|| !isset($_POST['address'])|| !isset($_POST['address2'])){
//     die('Error- Faltam alguns campos');

// }
// if(empty($_POST['name']) || empty($_POST['cpf']) || empty($_POST['telefone']) ||empty($_POST['dataNasc']) || empty($_POST['address'])|| empty($_POST['address2'])){
//     die('É necessário preencher todos os campos');
// }

$name =  $connection->real_escape_string($_POST['name']);
$cpf =  $connection->real_escape_string($_POST['cpf']);
$telefone =  $connection->real_escape_string($_POST['telefone']);
$dataNasc =  $connection->real_escape_string($_POST['dataNasc']);
$address = $connection->real_escape_string($_POST['address']);
$address2 = $connection->real_escape_string($_POST['address2']);
$city = $connection->real_escape_string($_POST['city']);
$state = $connection->real_escape_string($_POST['state']);
$zip = $connection->real_escape_string($_POST['zip']);

$search =  "SELECT cpf FROM client_data WHERE cpf=$cpf";

$response = $connection -> query($search);


if($response ->num_rows > 0){

    $_SESSION['message'] = "Usuário já está cadastrado.";
    $_SESSION['msg_type'] = 'warning';
    header('location:index.php');
    
}
else{
    $sql = "INSERT INTO client_data(name, cpf, telefone, data, address, address2, city, state, zip) VALUES('".$name."','".$cpf."', '".$telefone."', 
    '".$dataNasc."', '".$address."', '".$address2."', '".$city."', '".$state."', '".$zip."')";


    if(!$result = $connection -> query($sql) ){
        die('There was an error running the query [' . $connection->error . ']');
    }else{
        $_SESSION['message'] = "Usuário cadastrado com sucesso.";
        $_SESSION['msg_type'] = 'success';
        header('location:index.php');
    }
}



?>