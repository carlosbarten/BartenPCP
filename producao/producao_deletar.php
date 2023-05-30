<?php
session_start();
include_once("../conexao.php");
//error_reporting(0);
//ini_set('display_errors', 0);

// pegando o valor do idTipo_cerveja para inserir na tabela lote
  $og = "";
  $fg = "";
  $data_producao = "";
  $rendimento = "";
  $fim_fermentacao = "";
  $fim_maturacao = "";
  $lote = "";
  $id_lote= "";
//verificando se o botão consultar foi clicado"
if(isset($_POST['consultar'])){

  // concatenado % para fazer a consulta com o like
  $nome = $_POST['consultar'].'%';
  $sql = "SELECT * FROM lote WHERE lote like :nome";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->execute();
  $usuario = $stmt->fetch();

// atribuindo valores do bd para preencher no input
  if($usuario != null){
    $og = $usuario["OG_prod"];
    $fg = $usuario["FG_prod"];
    $data_producao = $usuario["data_prod"];
    $rendimento = $usuario["rendimento"];
    $fim_fermentacao = $usuario["data_final_fermentacao"];
    $fim_maturacao = $usuario["data_final_maturacao"];
    $lote = $usuario["lote"];
    $id_lote= $usuario["idTipo_cerveja"];
  }
  if(empty($usuario) && $_POST['consultar'] != ""){
    echo "<script>alert('Produção não encontrada!');</script>";
  }
}

if(isset($_POST["botao_apagar"])){
  $lote = $_POST["lote"];
  $sql = "DELETE FROM lote WHERE lote = '$lote'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  if($stmt->rowCount() > 0){
    echo "<script>alert('Receita deletada com sucesso!');</script>";
  }
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produção - Deletar</title>
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
        <h1 class="titulo text-center">Produção</h1>
        <div align="center"><hr width="60px" noshade></div>
        <h2 class="titulo2">Deletar</h2>
              
      </div>

    
      <form action="" method="post">
        <div class="infos">
          <label for="consultar">Lote:
            <input value = "<?php echo $lote ?>" size="25px" type="search" id = "consultar" name = "consultar" placeholder="B05" style="text-align: center;" autofocus>
            <button>Buscar</button>
          </label>
        </div>
      </form>
     
      <form method="post" action="" class="caixa">
      <div class="infos">
        <label for="lote">Lote:
          <input value = "<?php echo $lote ?>" type="text" id="lote" name="lote">
        </label>
      </div>

      <div class="infos">
        <label for="og">OG:
          <input value = "<?php echo $og ?>" type="text" id="og" name="og">
        </label>
      </div>

      <div class="infos">
        <label for="fg">FG:
          <input value = "<?php echo $fg ?>" type="text" id="fg" name="fg">
        </label>
      </div>

      <div class="infos">
        <label for="data_producao">Data Produção:
          <input value = "<?php echo $data_producao ?>" type="date" id="data_producao" name="data_producao">
        </label>
      </div>

      <div class="infos">
        <label for="rendimento">Rendimento:
          <input value = "<?php echo $rendimento ?>" type="text" id="rendimento" name="rendimento">
        </label>
      </div>

      <div class="infos">
        <label for="fim_fermentacao">Fim Fermentação:
          <input value = "<?php echo $fim_fermentacao ?>" type="date" id="fim_fermentacao" name="fim_fermentacao">
        </label>
      </div>

      <div class="infos">
        <label for="fim_maturacao">Fim maturação:
          <input value = "<?php echo $fim_maturacao ?>" type="date" id="fim_maturacao" name="fim_maturacao">
        </label>
      </div>

        <div class="container-fluid mt-3">
          <input class="btn btn-lg btn-danger" type="submit" value="Apagar" name="botao_apagar" id="botao_apagar">
        </div>

      </div>
      
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
  min-height: 640px;
  margin-top:80px;
  background-color: rgb(253, 240, 240);
  border-radius: 10px;
  margin-bottom: 30px;
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