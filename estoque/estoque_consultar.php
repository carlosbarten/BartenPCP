<?php
session_start();
include_once("../protect.php");
include_once("../conexao.php");
//error_reporting(0);
//ini_set('display_errors', 0);

$quantidade = '';
$tipo_embalagem = '';
$tipo_receita = '';

//verificando se o botão consultar foi clicado"
if(isset($_POST['consultar'])){

 // concatenado % para fazer a consulta com o like
  $nome = $_POST['tipo_receita'].' - '.$_POST['tipo_embalagem'];
  $sql = "SELECT SUM(quantidade) as total_quantidade FROM produto_acabado WHERE tipo_embalagem like :nome";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->execute();
  $usuario = $stmt->fetch();

  //var_dump($usuario) or die();
// atribuindo valores do bd para preencher no input
  if($usuario["total_quantidade"] != null){
    $quantidade = $usuario["total_quantidade"];
    $tipo_embalagem = $_POST['tipo_embalagem'];
    $tipo_receita = $_POST['tipo_receita'];

  }else{
    echo "<script>alert('Não há registros para " . $nome . " !')</script>";
  }
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estoque- Consulta</title>
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
        <h1 class="titulo text-center">Estoque</h1>
        <div align="center"><hr width="60px" noshade></div>
        <h2 class="titulo2">Consulta</h2>
              
      </div>
      
      <form action="" method="post">

        <label>Escolha o tipo:
              
            <div class="infos2">
            <label for="tipo">Embalagem:
              <select name="tipo_embalagem" id="tipo_embalagem" style="width: 185px; text-align: center">
                <option value="Barril 50L" <?php if($tipo_embalagem == "Barril 50L") echo 'selected'; ?>>Barril 50L</option>
                <option value="Barril 30L" <?php if($tipo_embalagem == "Barril 30L") echo 'selected'; ?> >Barril 30L</option>
                <option value="Garrafa 600ml" <?php if($tipo_embalagem == "Garrafa 600ml") echo 'selected'; ?>>Garrafa 600ml</option>
              </select>
            </label>
          </div>

          <div class="infos2">
            <label for="tipo">Tipo:
              <select name="tipo_receita" id="tipo_receita" style="width: 185px; text-align: center">
                <option value="Lager" <?php if($tipo_receita == "Lager") echo 'selected'; ?>>Lager</option>
                <option value="IPA" <?php if($tipo_receita == "IPA") echo 'selected'; ?>>IPA</option>
                <option value="Weiss" <?php if($tipo_receita == "Weiss") echo 'selected'; ?>>Weiss</option>
                <option value="Blond Ale" <?php if($tipo_receita == "Blond Ale") echo 'selected'; ?>>Blond Ale</option>
              </select>
            </label>
          </div>
        </label>
        <div class="infos">
            <button type="submit" class="btn btn-outline-secondary" id="consultar" name="consultar">Buscar</button>
        </div>
      </form>
    
      <div class="infos">
        <label for="qtd">Quantidade:
          <input value="<?php echo $quantidade ?>">
        </label>
      </div>  
      

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

  .infos2{
    align-items: end;
    justify-content: end;
    margin: 10px;
    flex-wrap: wrap;
    flex-direction: column;
    display: flex;
  }

  .infos2 > button{
    align-items: center;
    justify-content: center;
  }

  </style>

</html>