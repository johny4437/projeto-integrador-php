<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Controle de Clientes</title>
</head>
    

</head>
<body>
    <header>
        <div class="alert alert-secondary" id="header">
            <div class="title">
                <h3>Painel controle de Clientes</h3>
            </div>
            <div class="menu">
                <a href="clients.php">
                    <span>Listar Clientes</span>
                </a>
                <a href="debtors.php">
                    <span>Devedores</span>
                </a>
                <a href="orders.php">
                    <span>Criar ordem</span>
                </a>
            </div>
            
        </div>

    </header>
<?php
session_start();

if($_SESSION['loggedin']=false){
  echo 'Você não está Logado';
}else{

if(isset($_SESSION['message'])){
  $msg= $_SESSION['msg_type'];
  echo '<div class="alert alert-success" role="alert">';
  echo $_SESSION['message'];
  unset($_SESSION['message']);
  echo '</div>';
}
}


?>
          
    <form action="insert.php" method="POST" name="formuser">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNome4">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCPF">CPF</label>
            <input type="text" class="form-control" name ="cpf" id="cpf">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputTel">Telefone</label>
              <input type="text" class="form-control" name="telefone" id="telefone">
            </div>
            <div class="form-group col-md-6">
              <label for="inputNasc">Data de Nascimento</label>
              <input type="text" class="form-control" name="dataNasc" id="dataNasc" OnKeyUp="mascaraData(this);">
            </div>
          </div>
        <div class="form-group">
          <label for="inputAddress">Endereço</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Rua XXXX 123">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Complemento</label>
          <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartmento, Casa, etc...">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" name="city" id="city">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Estado</label>
            <input type="text" class="form-control"   name="state" id="state"/>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">CEP</label>
            <input type="text" class="form-control" name="zip" id="zip">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar" onclick="validate()"/>
      </form>
</body>

</html>