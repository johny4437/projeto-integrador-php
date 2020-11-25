<?php
require_once('config.php');
require_once('orders.php');
session_start();
$product_name = $connection -> real_escape_string($_POST['product_name']);
$value = $connection->real_escape_string($_POST['value']);
$nextWeek = time() + (30 * 24 * 60 * 60);
$venc = $connection->real_escape_string(date("Y-m-d",$nextWeek));
$date = $connection->real_escape_string(date("Y-m-d"));
$cpf = $connection->real_escape_string($_POST['cpf']);

$sql = "INSERT INTO debtors(valor, produto, id_cliente, data, vencimento) VALUES('".$value."', '".$product_name."', '".$cpf."', '".$date."','".$venc."')";


if(!$result = $connection-> query($sql)){
    die('There was an error running the query [' . $connection->error . ']');
}else{
    $_SESSION['message'] = 'Ordem criada com sucesso!';
    header('location:orders.php');
}

?>