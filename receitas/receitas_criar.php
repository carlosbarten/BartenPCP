<?php
session_start();
include_once("../conexao.php");
error_reporting(0);
ini_set('display_errors', 0);

if(isset($_POST['Nome']) && isset($_POST['Volume']) && isset($_POST['ABV']) && isset($_POST['Amargor'])){

  $nome = $_POST['Nome'];
  $volume = $_POST['Volume'];
  $abv = $_POST['ABV'];
  $Amargor = $_POST['Amargor'];
  $cor = $_POST['cor'];
  $mostura = $_POST['mostura'];
  $lavagem = $_POST['lavagem'];
  $fervura = $_POST['fervura'];
  $fermentacao = $_POST['fermentacao'];
  $og_rec = $_POST['og_rec'];
  $fg_rec = $_POST['fg_rec'];
  $temp_ferm = $_POST['temp_ferm'];
  $tempo_mat = $_POST['tempo_mat'];
  $sql = "INSERT INTO tipo_cerveja (Nome, info_volume, info_abv, info_amargor, info_cor, desc_mostura, desc_lavagem, desc_fervura, desc_fermentacao, OG_Estimado, FG_Estimado, tempo_fermentacao, tempo_maturacao) VALUES ('$nome', '$volume', '$abv', '$Amargor', '$cor', '$mostura', '$lavagem', '$fervura', '$fermentacao', '$og_rec', '$fg_rec', '$temp_ferm', '$tempo_mat')";
  $stmt = $pdo->prepare($sql);
  $success = $stmt->execute();

  if($success && $_POST['Nome'] != "" && $_POST['Volume'] != "" && $_POST['ABV'] != "" && $_POST['Amargor'] != "" && $_POST['cor'] != "" && $_POST['mostura'] != "" && $_POST['lavagem'] != "" && $_POST['fervura'] != "" && $_POST['fermentacao'] != "" && $_POST['og_rec'] != "" && $_POST['fg_rec'] != "" && $_POST['temp_ferm'] != "" && $_POST['tempo_mat'] != ""){
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
  }else{
    echo "<script>alert('Erro ao cadastrar receita!');</script>";
  }
} 

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receitas - Nova</title>
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
                <a class="nav-link active" aria-current="page" href="producao.php">Produção</a>
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
                <a class="nav-link disable" aria-current="page" href="../Index.php">Sair</a>
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
      <h1 class="titulo text-center">Receitas</h1>
      <div align="center"><hr width="60px" noshade></div>
      <h2 class="titulo2">Novo registro</h2>
            
    </div>

  
    <form method="post" action="" class="caixa">
      <div class="infos">
        <label for="Nome">Nome:
          <input type="text" id="Nome" name="Nome">
        </label>
      </div>

      <div class="infos">
        <label for="Volume">Volume:
          <input type="number" id="Volume" name="Volume">
        </label>
      </div>

      <div class="infos">
        <label for="ABV">ABV:
          <input type="number" id="ABV" name="ABV">
        </label>
      </div>

      <div class="infos">
        <label for="Amargor">Amargor:
          <input type="number" id="Amargor" name="Amargor">
        </label>
      </div>

      <div class="infos">
        <label for="cor">Cor:
          <input type="number" id="cor" name="cor">
        </label>
      </div>

      <div class="infos">
        <label for="mostura">Mostura:
          <textarea name="mostura" id="mostura" cols="23" rows="2"></textarea>
        </label>
      </div>

      <div class="infos">
        <label for="lavagem">Lavagem:
          <textarea name="lavagem" id="lavagem" cols="23" rows="2"></textarea>
        </label>
      </div>

      <div class="infos">
        <label for="fervura">Fervura:
          <textarea name="fervura" id="fervura" cols="23" rows="2"></textarea>
        </label>
      </div>

      <div class="infos">
        <label for="fermentacao">Fermentação:
          <textarea name="fermentacao" id="fermentacao" cols="23" rows="2"></textarea>
        </label>
      </div>

      <div class="infos">
        <label for="og_rec">OG:
          <input type="number" id="og_rec" name="og_rec">
        </label>
      </div>
      
      <div class="infos">
        <label for="fg_rec">FG:
          <input type="number" id="fg_rec" name="fg_rec">
        </label>
      </div>

      <div class="infos">
        <label for="tempo_ferm">Dias Fermentação:
          <input type="number" id="temp_ferm" name="temp_ferm">
        </label>
      </div>

      <div class="infos">
        <label for="tempo_mat">Dias Maturação:
          <input type="number" id="tempo_mat" name="tempo_mat">
        </label>
      </div>


      <div class="container-fluid mt-3 mb-4">
        <input class="btn btn-lg btn-primary" type="submit" style="background-color: green; border: green;" value="Salvar">
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
  min-height: 600px;
  margin-top: 100px;
  background-color: rgb(253, 240, 240);
  border-radius: 10px;
  margin-bottom: 50px;
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