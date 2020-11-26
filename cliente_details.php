<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");

if(!$_SESSION['loggedin']):
  header("location: index.html");

else:
  $login = $_SESSION["loggedin"];
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Debitos</title>
</head>
<body>
    <div class="alert alert-secondary" role="alert">
        Detalhes dos Débitos
    </div>
    <?php
    require_once('config.php');
    $cpf = $_GET['cpf'];
    $sql =  "SELECT * FROM debtors WHERE id_cliente=$cpf";
    $response = $connection->query($sql);

    if($response->num_rows>0){
        echo'<table border="3" class="border border-success" id="table">';
        echo'<thead>';
        echo'<th>Produto</th>';
        echo'<th>Valor</th>';
        echo'<th>Vencimento</th>';
        echo'</thead>';
        while($row=$response->fetch_assoc()){
            echo'<tbody>';
            echo"<td>".$row['produto']."</td>";
            echo"<td>$".$row['valor']."</td>";
            echo"<td>".$row['vencimento']."</td>";
            echo'</tbody>';

        }
        echo'</table>';
    }

    ?>
</body>
</html>