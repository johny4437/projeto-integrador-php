<?php
require_once('config.php');
session_start();

$username =$connection->real_escape_string($_POST['username']);
$password =$connection->real_escape_string($_POST['password']);

if(!isset($_POST['username'], $_POST['password'])){
    die('Preencha todos os campos usuário e senha');
}
$sql = "SELECT id, password FROM accounts WHERE username='$username'" ;

$response = $connection->query($sql) or die($connection->error);
if($response->num_rows>0){
    $row=$response->fetch_assoc();

    if($password===$row['password']){
        $_SESSION['loggedin']= true;
        $_SESSION['name'] = $_POST['username'];
        header('location:index.php');

    }else{
        echo'Senha ou usuario incorreto';
        // $_SESSION['msg'] = "Usuário ou Senha Incorreto";
    }
}else{
    echo'Senha ou usuario incorreto';
    $_SESSION['msg'] = "Preencha todos os Campos";
}
?>