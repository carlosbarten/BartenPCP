<?php

  require_once("conexao.php");  

  if(isset($_POST['inputUsuario']) && isset($_POST['inputSenha'])){

    $usuario = $_POST['inputUsuario'];
    $senha = $_POST['inputSenha'];

    $sql = "SELECT * FROM usuarios WHERE email = :usuario AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($resultado){
      session_start();
      $_SESSION['usuario'] = $usuario;
      header('Location: homepage.php');
    }else{
      echo "<script>alert('Usuário ou senha incorretos.');</script>";
    }
  }

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row align-items-center">
        </div class="col-md-10 mx-auto col-lg-5">
          <form action="" method="POST" class="container p-4 p-md-5 border rounded-4 bg-light">
            <div class="col-md-10 mx-auto col-lg-5 mb-4">
              <img src="/img/page2.png">
            
            </div>
            <div class="form-floating mb-4 mt-3">
              <input
                type="text"
                class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Usuário"/>
              <label for="inputUsuario">Usuário</label>
            </div>
            <div class="form-floating mb-4">
              <input
                type="password"
                class="form-control" id="inputSenha" name="inputSenha" placeholder="Senha"/>
              <label for="inputSenha">Senha</label>
            </div>
                                
            <p class="text-center"><button class="btn btn-lg btn-success w-50" type="submit">Entrar</button></p>
            
            <p class="text-center"><a href="./usuarios/Cadastrar_Usuário_no_login.php">Criar Conta</a></p>
          </form>
          
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>

  <footer>
      <div id="footer">
          <span>PCP Barten</span> 
      </div>
    </div>
  </footer>

  <style>
    img{
      width: 50%;
      margin: auto;
      display: block;
    }
    body{
      background-color: #edd4be;
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
      .container {
    width: 600px;
    height: 600px;
    margin-top: 50px;
    }
  </style>

</html>