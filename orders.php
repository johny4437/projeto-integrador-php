<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Criar Ordens</title>
</head>
<body>
<header>
        <div class="alert alert-secondary" id="header">
            <div class="title">
                <h5>Criar ordem de Compra</h5>
            </div>
            <div class="menu">
                <a href="debtors.php">
                    <span>Devedores</span>
                </a>
                <a href="index.php">
                    <span>Cadastrar Cliente</span>
                </a>
                <a href="clients.php">
                    <span>Listar Clientes</span>
                </a>
            </div>
            
        </div>

    </header>
<form action="orderinsert.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome do Produto</label>
      <input type="text" class="form-control" name="product_name" id="product_name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Valor</label>
      <input type="text" class="form-control" name="value" id="value">
    </div>
  </div>
  <div class="form-row">
    <!-- <div class="form-group col-md-6">
      <label for="inputEmail4">Data de Vencimento</label>
      <input type="text" class="form-control" name="date" id="date">
    </div> -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">CPF do Cliente</label>
      <input type="text" class="form-control" name="cpf" id="cpf">
    </div>
  </div>
  
  <input type="submit" class="btn btn-primary" value="Criar ordem">
</form>
<?php
session_start();
if(isset($_SESSION['message'])){
  echo'<p>';
  echo '<div class="alert alert-success" role="alert">';
  echo $_SESSION['message'];
  unset($_SESSION['message']);
  echo '</div>';
  echo'</p>';
}

?>
</body>
</html>