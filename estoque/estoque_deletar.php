<?php
  session_start();
  include_once("../conexao.php");
 // error_reporting(0);
  //ini_set('display_errors', 0);

// pegando o valor do idTipo_cerveja para inserir na tabela lote
$nome_lote = '';
$id_lote;
$tipo_embalagem = '';
$tipo_receita = '';
//verificando se o botão consultar foi clicado
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
    $nome_lote = $usuario["lote"];
    $id_lote= $usuario["idLote"];
  }
  if(empty($usuario) && $_POST['consultar'] != ""){
    echo "<script>alert('lote não encontrado!');</script>";
  }
}

if(isset($_POST['deletar'])){
  $id_lote = $_POST['id_lote_hold'];
  $tipo_embalagem = $_POST['tipo_receita'].' - '.$_POST['tipo_embalagem'];
  $quantidade= $_POST['quantidade'];
  $sql = "UPDATE produto_acabado SET quantidade = quantidade - :quantidade WHERE idlote = :id_lote AND tipo_embalagem = :tipo_embalagem";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':quantidade', $quantidade);
  $stmt->bindParam(':id_lote', $id_lote);
  $stmt->bindParam(':tipo_embalagem', $tipo_embalagem);
  $stmt->execute();

  if($stmt->rowCount() > 0){
    echo "<script>alert('Estoque removido com sucesso!');</script>";
  }else{
    echo "<script>alert('Erro ao remover estoque!');</script>";
  }

  $sql = "SELECT * FROM produto_acabado WHERE idlote = :id_lote AND tipo_embalagem = :tipo_embalagem";
  $stmt = $pdo->prepare($sql); 
  $id_lote = $_POST['id_lote_hold'];
  $tipo_embalagem = $_POST['tipo_receita'].' - '.$_POST['tipo_embalagem'];
  $stmt->bindParam(':id_lote', $id_lote);
  $stmt->bindParam(':tipo_embalagem', $tipo_embalagem);
  $stmt->execute();
  $usuario = $stmt->fetch();
  
  if($usuario['quantidade'] <= 0){
    $sql = "DELETE FROM produto_acabado WHERE idlote = :id_lote AND tipo_embalagem = :tipo_embalagem";
    $stmt = $pdo->prepare($sql); 
    $id_lote = $_POST['id_lote_hold'];
    $tipo_embalagem = $_POST['tipo_receita'].' - '.$_POST['tipo_embalagem'];
    $stmt->bindParam(':id_lote', $id_lote);
    $stmt->bindParam(':tipo_embalagem', $tipo_embalagem);
    $stmt->execute();
    echo "<script>alert('Estoque deste $id_lote e $tipo_embalagem esgotado');</script>";
  }
  

}
  ?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estoque - Deletar</title>
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
        <h1 class="titulo text-center">Estoque</h1>
        <div align="center"><hr width="60px" noshade></div>
        <h2 class="titulo2">Deletar</h2>
              
      </div>

    <div class="caixa">

        <form action="" method="post">
          <div class="infos">
            <label for="consultar">Lote:
              <input value = "<?php echo $nome_lote ?>" size="25px" type="search" id = "consultar" name = "consultar" placeholder="I01" style="text-align: center;" autofocus>
              <button>Buscar</button>
            </label>
          </div>
        </form>
        
        <form action="" method="POST">
          <div class="infos">
            <label for="tipo">Embalagem:
              <select name="tipo_embalagem" id="tipo_embalagem" style="width: 185px; text-align: center">
                <option value="Barril 50L" <?php if($tipo_embalagem == "Barril 50L") echo 'selected'; ?>>Barril 50L</option>
                <option value="Barril 30L" <?php if($tipo_embalagem == "Barril 30L") echo 'selected'; ?> >Barril 30L</option>
                <option value="Garrafa 600ml" <?php if($tipo_embalagem == "Garrafa 600ml") echo 'selected'; ?>>Garrafa 600ml</option>
              </select>
            </label>
          </div>

          <div class="infos">
            <label for="tipo">Tipo:
              <select name="tipo_receita" id="tipo_receita" style="width: 185px; text-align: center">
                <option value="Lager" <?php if($tipo_receita == "Lager") echo 'selected'; ?>>Lager</option>
                <option value="IPA" <?php if($tipo_receita == "IPA") echo 'selected'; ?>>IPA</option>
                <option value="Weiss" <?php if($tipo_receita == "Weiss") echo 'selected'; ?>>Weiss</option>
                <option value="Blond Ale" <?php if($tipo_receita == "Blond Ale") echo 'selected'; ?>>Blond Ale</option>
              </select>
            </label>
          </div>
          
          <div class="infos">
            <label for="quantidade">Quantidade:
              <input value = "<?php echo $quantidade ?>" size="25px" type="number" id = "quantidade" name = "quantidade" style="text-align: center;">
            </label>
          </div>

          <input type="text" value="<?php echo $id_lote ?>" name="id_lote_hold" hidden>

          <div class="container-fluid mt-3 mb-4">
            <input class="btn btn-lg btn-danger" type="submit" name="deletar" value="Apagar">
          </div>

        </form>
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
  min-height: 600px;
  margin-top: 100px;
  margin-bottom: 50px;
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
    align-items:end;
    justify-content: center;
    margin: 10px;
    flex-wrap: wrap;
    flex-direction: column;
    display: flex;
  }
  </style>

</html>