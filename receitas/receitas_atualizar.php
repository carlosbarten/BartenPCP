<?php
session_start();
include_once("../conexao.php");
include('../protect.php');
error_reporting(0);
ini_set('display_errors', 0);

//variaveis recebendo valores vazios para não dar erro de parametro de consulta
$nome_atualizar = '';
$volume = '';
$abv = '';
$Amargor = '';
$cor = '';
$mostura = '';
$lavagem = '';
$fervura = '';
$fermentacao = '';
$og_rec = '';
$fg_rec = '';
$temp_ferm = '';
$tempo_mat = '';

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
    $volume = $usuario["info_volume"];
    $abv = $usuario["info_abv"];
    $Amargor = $usuario["info_amargor"];
    $cor = $usuario["info_cor"];
    $mostura = $usuario["desc_mostura"];
    $lavagem = $usuario["desc_lavagem"];
    $fervura = $usuario["desc_fervura"];
    $fermentacao = $usuario["desc_fermentacao"];
    $og_rec = $usuario["OG_Estimado"];
    $fg_rec = $usuario["FG_Estimado"];
    $temp_ferm = $usuario["tempo_fermentacao"];
    $tempo_mat = $usuario["tempo_maturacao"];
  }
}

if(isset($_POST["botao_atualizar"])){
  $nome_atualizar = $_POST["nome_atualizado2"];
  $nome1 = $_POST["nome"];
  $volume1 = $_POST["Volume"];
  $abv1 = $_POST["ABV"];
  $Amargor1 = $_POST["Amargor"];
  $cor1 = $_POST["cor"];
  $mostura1 = $_POST["mostura"];
  $lavagem1 = $_POST["lavagem"];
  $fervura1 = $_POST["fervura"];
  $fermentacao1 = $_POST["fermentacao"];
  $og_rec1 = $_POST["og_rec"];
  $fg_rec1 = $_POST["fg_rec"];
  $temp_ferm1 = $_POST["temp_ferm"];
  $tempo_mat1 = $_POST["tempo_mat"];
  $sql = "UPDATE tipo_cerveja SET nome ='$nome1',info_volume = '$volume1', info_abv = '$abv1', info_amargor = '$Amargor1', info_cor = '$cor1', desc_mostura = '$mostura1', desc_lavagem = '$lavagem1', desc_fervura = '$fervura1', desc_fermentacao = '$fermentacao1', OG_Estimado = '$og_rec1', FG_Estimado = '$fg_rec1', tempo_fermentacao = '$temp_ferm1', tempo_maturacao = '$tempo_mat1' WHERE Nome = '$nome_atualizar'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  if($stmt->rowCount() > 0){
    echo "<script>alert('Receita atualizada com sucesso!');</script>";
  }
}
#se consulta estiver vazia, exibe mensagem de erro
if(empty($usuario) && $_POST['consultar'] != ""){
  echo "<script>alert('Receita não encontrada!');</script>";
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receitas - Atualizar</title>
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
        <h1 class="titulo text-center">Receitas</h1>
        <div align="center"><hr width="60px" noshade></div>
        <h2 class="titulo2">Atualizar registro</h2>
              
      </div>
      
        <form action="" method="post">
          <div class="infos">
            <label for="consultar">Nome:
              <input value = "<?php echo $nome_atualizar ?>" size="25px" type="search" id = "consultar" name = "consultar" placeholder="IPA" style="text-align: center;" autofocus>
              <button>Buscar</button>
            </label>
          </div>
        </form>

        <form method="post" action="" class="caixa">
        <div class="infos">
          <label for="Nome">Nome:
            <input value = "<?php echo $nome_atualizar ?>" type="text" id="nome" name="nome">
          </label>
        </div>

        <div class="infos">
          <label for="Volume">Volume:
            <input value = "<?php echo $volume ?>" type="number" id="Volume" name="Volume">
          </label>
        </div>

        <div class="infos">
          <label for="ABV">ABV:
            <input value = "<?php echo $abv ?>" type="number" id="ABV" name="ABV">
          </label>
        </div>

        <div class="infos">
          <label for="Amargor">Amargor:
            <input value = "<?php echo $Amargor ?>" type="number" id="Amargor" name="Amargor">
          </label>
        </div>

        <div class="infos">
          <label for="cor">Cor:
            <input value = "<?php echo $cor ?>" type="number" id="cor" name="cor">
          </label>
        </div>

        <div class="infos">
          <label for="mostura">Mostura:
            <textarea name="mostura" id="mostura" cols="23" rows="2"><?php echo $mostura ?></textarea>
          </label>
        </div>

        <div class="infos">
          <label for="lavagem">Lavagem:
            <textarea name="lavagem" id="lavagem" cols="23" rows="2"><?php echo $lavagem ?></textarea>
          </label>
        </div>

        <div class="infos">
          <label for="fervura">Fervura:
            <textarea name="fervura" id="fervura" cols="23" rows="2"><?php echo $fervura ?></textarea>
          </label>
        </div>

        <div class="infos">
          <label for="fermentacao">Fermentação:
            <textarea name="fermentacao" id="fermentacao" cols="23" rows="2"><?php echo $fermentacao ?></textarea>
          </label>
        </div>

        <div class="infos">
          <label for="og_rec">OG:
            <input value = "<?php echo $og_rec ?>" type="number" id="og_rec" name="og_rec">
          </label>
        </div>
        
        <div class="infos">
          <label for="fg_rec">FG:
            <input value = "<?php echo $fg_rec ?>" type="number" id="fg_rec" name="fg_rec">
          </label>
        </div>

        <div class="infos">
          <label for="tempo_ferm">Dias Fermentação:
            <input value = "<?php echo $temp_ferm ?>" type="number" id="temp_ferm" name="temp_ferm">
          </label>
        </div>

        <div class="infos">
          <label for="tempo_mat">Dias Maturação:
            <input value = "<?php echo $tempo_mat ?>" type="number" id="tempo_mat" name="tempo_mat">
          </label>
        </div>


        <div class="container-fluid mt-3 mb-4">
          <input class="btn btn-lg btn-primary" type="submit" id="botao_atualizar" name="botao_atualizar" style="background-color: green; border: green;" value="Atualizar">
        </div>  
        <input type="hidden" name="nome_atualizado2" value="<?php echo $nome_atualizar ?>">
      </form>
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