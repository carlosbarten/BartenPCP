<?php
session_start();
include_once("../conexao.php");
include('../protect.php');
error_reporting(0);
ini_set('display_errors', 0);

//Logica inserção na tabela pedidos
if(isset($_POST['nome']) && isset($_POST['tipo']) && isset($_POST['quantidade']) && isset($_POST['valor'])){

  $nome = $_POST['nome'];
  $tipo = $_POST['tipo'];
  $quantidade = $_POST['quantidade'];
  $valor = $_POST['valor'];
  $sql = "INSERT INTO inventario (nome, tipo, quantidade, valor) VALUES ('$nome', '$tipo', '$quantidade', '$valor')";
  $stmt = $pdo->prepare($sql);
  $success = $stmt->execute();

  if($success && $_POST['nome'] != "" && $_POST['tipo'] != "" && $_POST['quantidade'] != "" && $_POST['valor'] != ""){
    echo "<script>alert('Ativo cadastrado com sucesso!');</script>";
  }else{
    echo "<script>alert('Erro ao cadastrar Ativo!');</script>";
  }
} 

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventário - Novo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <header>
    <nav class="navbar bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="../HomePage.php">PCP Barten</a>
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
                <a class="nav-link active" aria-current="page" href="../HomePage.php">Início</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../usuarios/usuarios.php">Usuários</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../producao/producao.php">Produção</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../receitas/receitas.php">Receitas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../pedidos/pedidos.php">Pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../materia_prima/materia_prima.php">Matéria Prima</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../estoque/estoque.php">Estoque</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../inventario/inventario.php">Inventário</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disable" aria-current="page" href="../logout.php">Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="container">
  <div class="d-flex flex-wrap mt-3 flex-column">
    <div class="w-100 my-4 mt-0">
      <h1 class="titulo text-center">Inventário</h1>
      <div align="center"><hr width="60px" noshade></div>
      <h2 class="titulo2">Novo registro</h2>
            
    </div>

  
    <form method="post" action="" class="caixa">
      <div class="infos">
        <label for="nome">Nome:
          <input type="text" id="nome" name="nome">
        </label>
      </div>

      <div class="infos">
        <label for="tipo">Tipo:
          <select name="tipo" id="tipo" style="width: 185px; text-align: center">
            <option value="Produção">Produção</option>
            <option value="Armazenamento">Armazenamento</option>
            <option value="Venda">Venda</option>
          </select>
        </label>
      </div>

      <div class="infos">
        <label for="quantidade">Quantidade:
          <input type="text" id="quantidade" name="quantidade">
        </label>
      </div>

      <div class="infos">
        <label for="valor">Valor:
          <input type="text" id="valor" name="valor">
        </label>
      </div>
          
      
      <div class="container-fluid mt-3">
        <input class="btn btn-lg btn-primary" type="submit" style="background-color: green; border: green;" name="salvar" id="salvar" value="Salvar">
      </div>  
    </form>
      
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </main>

  <footer>
      <div id="footer">
          <span>PCP Barten</span> 
      </div>
    </div>
  </footer>

  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    img{
      max-width: 100%;
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
  .titulo{
      text-align: center;
      font-size: 2rem;
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
  }
  .titulo2{
    text-align: center;
      font-size: 1.5rem;
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      margin-top: 4px;
  }
  .container {
  display: flex;
  justify-content: center;
  width: 600px;
  height: 600px;
  margin-top: 100px;
  background-color: rgb(253, 240, 240);
  border-radius: 10px;
  }

  .caixa{
    justify-content: center;
    align-items:end;
    flex-wrap: wrap;
    flex-direction: column;
    gap: 5px;
    display: flex;
  }

  .caixa > div{
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: column;
    display: flex;
  }

  .caixa > div a{
    width: 200px;
    height: 200px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: column;
    display: flex;
  }

  .caixa > div img{
    height: 100px;
  }

  .caixa > div img:hover{
    filter: invert();
  }

  .child {
  width: 200px;
  height: 180px;
  }

  .infos{
    align-items: center;
    justify-content: center;
    margin: 10px;
    flex-wrap: wrap;
    flex-direction: column;
    display: flex;
  }
  </style>

</html>