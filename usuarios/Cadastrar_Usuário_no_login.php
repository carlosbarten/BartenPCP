<?php

include_once("../conexao.php");

if(isset($_SESSION)){
  session_start();
}

if(isset($_POST['inputNome']) && isset($_POST['inputEmail']) && isset($_POST['inputTelefone']) && isset($_POST['inputSenha'])){

  $nome = $_POST['inputNome'];
  $email = $_POST['inputEmail'];
  $telefone = $_POST['inputTelefone'];
  $senha = $_POST['inputSenha'];

  $sql = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':senha', $senha);
  $stmt->execute();

  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

  if($resultado){
    $_SESSION['usuario'] = $resultado['email'];
    header("Location: ../Index.php");
  }else{
    echo "Usuário ou senha inválidos!";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <header>
    <nav class="navbar bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="../Index.php">PCP Barten</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">PCP Barten</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../Index.php">Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <body>
    
    <div class="container mt-5 pt-5 p-md-5">
      <div class="row align-items-center">
        </div class="col-md-10 mx-auto col-lg-4">
          <form action="" method="POST" class="p-4 p-md-5 border rounded-4 bg-light">
            <h1 class="titulo">Cadastro de Usuário</h1>
            <br>
            <div class="input p-md-1">
              <span class="input-group-text">Nome Completo</span>
              <input
              type="text"
              class="form-control" id="inputNome" placeholder="Ex: José..."/>
            </div>
            <div class="input p-md-1">
              <span class="input-group-text">E-mail</span>
              <input
              type="email"
              class="form-control" id="inputEmail" placeholder="Ex:jose@gmail.com"/>
            </div>
            <div class="input p-md-1">
              <span class="input-group-text">Telefone</span>
              <input
              type="number"
              class="form-control" id="inputTelefone" placeholder="(xx) xxxxx-xxxx"/>
            </div> 
            <div class="input p-md-1">
              <span class="input-group-text">Senha</span>
              <input
              type="password"
              class="form-control" id="inputSenha"/>
            </div>
            <div class="d-grid gap-3 col-6 mx-auto mt-3">
              <button class="botao btn btn-lg btn-success w-150" type="submit">Cadastrar</button>
            </div>
            <div class="d-grid gap-3 col-6 mx-auto mt-2">
              <p class="botao text-center"><a href="../Index.php">Cancelar</a></p>
            </div>


          </form>
          
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
    
  </body>

  <footer>
      <div id="footer">
          <span>PCP Barten</span> 
      </div>
    </div>
  </footer>

  <style>
    body{
      background-color: #edd4be;
    }
    .titulo{
      text-align: center;
      font-size: 35px;
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
  }
  .input{
    margin: auto;
    margin-top: 10px;
    max-width:525px
  }
  .botao{
    margin: auto;
    width: 250px;
    max-width: 250px;
  }
  footer{    
        background: #d3ad98;
        position:fixed;
        bottom:0; 
        width:100%;
        margin-top: 10px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        }
  </style>

</html>