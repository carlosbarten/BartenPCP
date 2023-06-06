<?php
session_start();
include_once("../conexao.php");
include('../protect.php');
error_reporting(0);
ini_set('display_errors', 0);

// pegando o valor do idTipo_cerveja para inserir na tabela lote
$nome_atualizar = '';
$id_lote;
//verificando se o botão consultar foi clicado
if(isset($_POST['consultar'])){

  // concatenado % para fazer a consulta com o like
  $nome = $_POST['consultar'].'%';
  $sql = "SELECT * FROM tipo_cerveja WHERE nome like :nome";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->execute();
  $usuario = $stmt->fetch();

// atribuindo valores do bd para preencher no input
  if($usuario != null){
    $nome_atualizar = $usuario["Nome"];
    $id_lote= $usuario["idTipo_cerveja"];
  }
  if(empty($usuario) && $_POST['consultar'] != ""){
    echo "<script>alert('Receita não encontrada!');</script>";
  }
}
//Logica inserção na tabela lote
if(isset($_POST['lote']) && isset($_POST['og']) && isset($_POST['fg']) && isset($_POST['data_producao']) && isset($_POST['rendimento']) && isset($_POST['fim_fermentacao']) && isset($_POST['fim_maturacao'])){

  $lote = $_POST['lote'];
  $og = $_POST['og'];
  $fg = $_POST['fg'];
  $data_producao = $_POST['data_producao'];
  $rendimento = $_POST['rendimento'];
  $fim_fermentacao = $_POST['fim_fermentacao'];
  $fim_maturacao = $_POST['fim_maturacao'];
  $id_lote = $_POST['id_lote'];
  $sql = "INSERT INTO lote (OG_prod, FG_prod, lote, data_prod, rendimento, data_final_fermentacao, data_final_maturacao, idTipo_cerveja) VALUES ('$og', '$fg', '$lote', '$data_producao', '$rendimento', '$fim_fermentacao', '$fim_maturacao', '$id_lote')";
  $stmt = $pdo->prepare($sql);
  $success = $stmt->execute();

  if($success && $_POST['lote'] != "" && $_POST['og'] != "" && $_POST['fg'] != "" && $_POST['data_producao'] != "" && $_POST['rendimento'] != "" && $_POST['fim_fermentacao'] != "" && $_POST['fim_maturacao'] != ""){
    echo "<script>alert('Produção cadastrada com sucesso!');</script>";
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
    <title>Produção - Nova</title>
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
      <h1 class="titulo text-center">Produção</h1>
      <div align="center"><hr width="60px" noshade></div>
      <h2 class="titulo2">Novo registro</h2>
            
    </div>

    <form action="" method="post">
        <div class="infos">
          <label for="consultar">Tipo:
            <input value = "<?php echo $nome_atualizar ?>" size="25px" type="search" id = "consultar" name = "consultar" placeholder="IPA" style="text-align: center;" autofocus>
            <button>Buscar</button>
          </label>
        </div>
      </form>

    <form method="post" action="" class="caixa">
      <div class="infos">
        <label for="lote">Lote:
          <input type="text" id="lote" name="lote">
        </label>
      </div>

      <div class="infos">
        <label for="og">OG:
          <input type="text" id="og" name="og">
        </label>
      </div>

      <div class="infos">
        <label for="fg">FG:
          <input type="text" id="fg" name="fg">
        </label>
      </div>

      <div class="infos">
        <label for="data_producao">Data Produção:
          <input type="date" id="data_producao" name="data_producao">
        </label>
      </div>

      <div class="infos">
        <label for="rendimento">Rendimento:
          <input type="text" id="rendimento" name="rendimento">
        </label>
      </div>

      <div class="infos">
        <label for="fim_fermentacao">Fim Fermentação:
          <input type="date" id="fim_fermentacao" name="fim_fermentacao">
        </label>
      </div>

      <div class="infos">
        <label for="fim_maturacao">Fim maturação:
          <input type="date" id="fim_maturacao" name="fim_maturacao">
        </label>
      </div>
      <div class="container-fluid mt-3">
        <input class="btn btn-lg btn-primary" type="submit" style="background-color: green; border: green;" value="Salvar">
      </div>  
      <input value = "<?php echo $id_lote ?>" type="text" id="id_lote" name="id_lote" hidden>
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