<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
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
  <div class="d-flex flex-wrap justify-content-center align-items-start flex-column">
      <div class="w-100 my-4 mt-0">
        <h1 class="titulo text-center">Usuários</h1>
      </div>

      <div class="caixa w-100">
          <div>
              <a href="Cadastrar_Usuário_with_login.php" class="btn btn-lg btn-outline-dark">  
              Adicionar 
              <img class="mt-3" src="/img/adicionar.png"/>
            </a>
          </div>

          <div>
            <a href="usuarios_consultar.php" class="btn btn-lg btn-outline-dark">  
            Consultar
            <img class="mt-3" src="/img/Visualizar.png"/>
          </a>
          </div>
        
          <div>
              <a href="usuarios_atualizar.php" class="btn btn-lg btn-outline-dark">  
              Atualizar
              <img class="mt-3" src="/img/editar.png" />
            </a>
          </div>

          <div>
            <a href="usuarios_deletar.php" class="btn btn-lg btn-outline-dark">  
            Deletar
            <img class="mt-3" src="/img/deletar.png" />
          </a>
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
    align-items: center;
    flex-wrap: wrap;
    flex-direction: row;
    gap: 25px;
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
  </style>

</html>