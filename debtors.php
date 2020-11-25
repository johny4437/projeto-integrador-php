<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Lista de Devedores</title>
</head>
<body>
<header>
        <div class="alert alert-secondary" id="header">
            <div class="title">
                <h3>Clientes em Débito</h3>
            </div>
            <div class="menu">
                <a href="clients.php">
                    <span>Listar Clientes</span>
                </a>
                <a href="index.php">
                    <span>Inserir Cliente</span>
                </a>
                <a href="orders.php">
                    <span>Criar ordem</span>
                </a>
            </div>
            
        </div>

    </header>
<?php
require_once('config.php');
$sql = "SELECT name, cpf FROM client_data INNER JOIN debtors ON(debtors.id_cliente = client_data.cpf) GROUP BY name";
$result = $connection ->query($sql);
if($result-> num_rows>0){
    echo '<table border="1" class="border border-success" id="table">';
    echo "<thead>";
            echo " <tr>";
            echo " <th>Nome</th>";
            echo " <th>Situação</th>";   
            echo "</tr>";        
    echo "</thead>";
    
    while($row=$result->fetch_assoc()){
        $a=$row['cpf'];
        echo"<tbody>";
            echo "<td>".$row['name']."</td>";
            echo "<td><a href='cliente_details.php?cpf=$a'>Ver debitos</a></td>";
        echo"</tbody>";
    }
echo '</table>';
}
    


?>
</body>
</html>