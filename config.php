<?php
$host="localhost";
$user="root";
$password="johny@123";
$dbName="projeto";

$connection =  new mysqli($host, $user, $password, $dbName);

if($connection-> connect_error){
    die("Connection Failed" .$connection-> connect_error);
}

?>